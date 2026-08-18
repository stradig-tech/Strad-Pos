import React, {useEffect, useState, useCallback } from "react";
import axios from "axios";
import Swal from "sweetalert2";
import Cart from "./Cart";
import toast, { Toaster } from "react-hot-toast";
import CustomerSelect from "./CutomerSelect";

import SuccessSound from "../sounds/beep-07a.mp3";
import WarningSound from "../sounds/beep-02.mp3";
import playSound from "../utils/playSound";

// Build a human-readable message from an axios error. Laravel validation
// errors (HTTP 422) live in `response.data.errors` keyed by field, so we
// surface those first, then fall back to a generic message/network error.
function getErrorMessage(err, fallback = "Something went wrong. Please try again.") {
    const data = err?.response?.data;
    if (data?.errors && typeof data.errors === "object") {
        const messages = Object.values(data.errors).flat().filter(Boolean);
        if (messages.length) return messages.join("\n");
    }
    if (data?.message) return data.message;
    return err?.message || fallback;
}

export default function Pos() {
    const [products, setProducts] = useState([]);
    const [carts, setCarts] = useState([]);
    const [orderDiscount, setOrderDiscount] = useState(0);
    const [paid, setPaid] = useState(0);
    const [due, setDue] = useState(0);
    const [change, setChange] = useState(0);
    const [total, setTotal] = useState(0);
    const [updateTotal, setUpdateTotal] = useState(0);
    const [customerId, setCustomerId] = useState();
    const [cartUpdated, setCartUpdated] = useState(false);
    const [productUpdated, setProductUpdated] = useState(false);
    const [searchQuery, setSearchQuery] = useState("");
    const [searchBarcode, setSearchBarcode] = useState("");
    const { protocol, hostname, port } = window.location;
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(0);
    const [loading, setLoading] = useState(false);
    const fullDomainWithPort = `${protocol}//${hostname}${
        port ? `:${port}` : ""
    }`;
    const getProducts = useCallback(
        async (search = "", page = 1, barcode = "") => {
            setLoading(true);
            try {
                const res = await axios.get('/admin/get/products', {
                    params: { search, page, barcode },
                });
                const productsData = res.data;
                setProducts((prev) => [...prev, ...productsData.data]); // Append new products
                if (productsData.data.length === 1 && barcode != "") {
                    addProductToCart(productsData.data[0].id);
                    getCarts();
                }
                setTotalPages(productsData.meta.last_page); // Get total pages
            } catch (error) {
                console.error("Error fetching products:", error);
            } finally {
                setLoading(false); // Set loading to false
            }
        },
        []
    );
    const getUpdatedProducts = useCallback(async () => {
        try {
            const res = await axios.get('/admin/get/products');
            const productsData = res.data;
            setProducts(productsData.data);
            setTotalPages(productsData.meta.last_page); // Get total pages
        } catch (error) {
            console.error("Error fetching products:", error);
        }
    }, []);
    useEffect(() => {
        getUpdatedProducts();
    }, [productUpdated]);

    const getCarts = async () => {
        try {
            const res = await axios.get('/admin/cart');
            const data = res.data;
            setTotal(data?.total);
            setUpdateTotal(data?.total - orderDiscount);
            setCarts(data?.carts);
        } catch (error) {
            console.error("Error fetching carts:", error);
        }
    };

    useEffect(() => {
        getCarts();
    }, []);

    useEffect(() => {
        getCarts();
    }, [cartUpdated]);

    useEffect(() => {
        let paid1 = paid;
        let disc = orderDiscount;
        if (paid == "") {
            paid1 = 0;
        }
        if (orderDiscount == "") {
            disc = 0;
        }
        const updatedTotalAmount = parseFloat(total) - parseFloat(disc);
        // Positive balance => still owed (due); negative => overpaid (change to return).
        const balance = updatedTotalAmount - parseFloat(paid1);
        setUpdateTotal(updatedTotalAmount?.toFixed(2));
        setDue((balance > 0 ? balance : 0).toFixed(2));
        setChange((balance < 0 ? -balance : 0).toFixed(2));
    }, [orderDiscount, paid, total]);
    useEffect(() => {
        if (searchQuery) {
            setProducts([]);
            getProducts(searchQuery, currentPage, "");
        }
        setSearchBarcode("");
    }, [currentPage, searchQuery]);

    useEffect(() => {
        if (searchBarcode) {
            setProducts([]);
           getProducts("", currentPage, searchBarcode);
        }
    }, [searchBarcode]);

    // Infinite scroll logic
    useEffect(() => {
        const handleScroll = () => {
            if (
                window.innerHeight + document.documentElement.scrollTop >=
                document.documentElement.offsetHeight
            ) {
                // Load next page if not on the last page
                if (currentPage < totalPages) {
                    setCurrentPage((prev) => prev + 1);
                }
            }
        };

        window.addEventListener("scroll", handleScroll);
        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, [currentPage, totalPages]);

    function addProductToCart(id) {
        axios
            .post("/admin/cart", { id })
            .then((res) => {
                setCartUpdated(!cartUpdated);
                playSound(SuccessSound);
                toast.success(res?.data?.message);
            })
            .catch((err) => {
                playSound(WarningSound);
                toast.error(getErrorMessage(err));
            });
    }
    function cartEmpty() {
        if (total <= 0) {
            return;
        }
        Swal.fire({
            title: "Are you sure you want to delete Cart?",
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: "No",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                denyButton: "order-3",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .put("/admin/cart/empty")
                    .then((res) => {
                        setCartUpdated(!cartUpdated);
                        playSound(SuccessSound);
                        toast.success(res?.data?.message);
                    })
                    .catch((err) => {
                        playSound(WarningSound);
                        toast.error(getErrorMessage(err));
                    });
            } else if (result.isDenied) {
                return;
            }
        });
    }
    function orderCreate() {
        if (total <= 0) {
            return;
        }
        if (!customerId) {
            toast.error("Please select customer");
            return;
        }
        const balanceLine =
            parseFloat(change) > 0
                ? `Change to return: ${change}`
                : `Due: ${due}`;
        Swal.fire({
            title: `Are you sure you want to complete this order? <br>${balanceLine}`,
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: "No",
            customClass: {
                actions: "my-actions",
                cancelButton: "order-1 right-gap",
                confirmButton: "order-2",
                denyButton: "order-3",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .put("/admin/order/create", {
                        customer_id: customerId,
                        order_discount: parseFloat(orderDiscount) || 0,
                        paid: parseFloat(paid) || 0,
                    })
                    .then((res) => {
                        setCartUpdated(!cartUpdated);
                        setProductUpdated(!productUpdated);
                        toast.success(res?.data?.message);
                        // window.location.href = `orders/invoice/${res?.data?.order?.id}`;
                        window.location.href = `orders/pos-invoice/${res?.data?.order?.id}`;
                    })
                    .catch((err) => {
                        playSound(WarningSound);
                        toast.error(getErrorMessage(err), { duration: 6000 });
                    });
            } else if (result.isDenied) {
                return;
            }
        });
    }
    return (
        <>
            <div className="ds-pos-container mt-3 mx-2">
                <div className="row">
                    {/* CART PANEL (LEFT) */}
                    <div className="col-lg-5 mb-4 mb-lg-0">
                        <div className="ds-pos-cart-panel">
                            <div className="mb-3">
                                <div className="ds-pos-customer-select">
                                    <CustomerSelect setCustomerId={setCustomerId} />
                                </div>
                            </div>
                            
                            <Cart
                                carts={carts}
                                setCartUpdated={setCartUpdated}
                                cartUpdated={cartUpdated}
                            />
                            
                            <div className="ds-pos-summary-box mt-auto">
                                <div className="ds-summary-row">
                                    <span className="ds-summary-label">Sub Total:</span>
                                    <span className="ds-summary-value">{total}</span>
                                </div>
                                <div className="ds-summary-row">
                                    <span className="ds-summary-label">Discount:</span>
                                    <input
                                        type="number"
                                        className="ds-summary-input"
                                        placeholder="0.00"
                                        min={0}
                                        disabled={total <= 0}
                                        value={orderDiscount}
                                        onChange={(e) => {
                                            const value = e.target.value;
                                            if (parseFloat(value) > total || parseFloat(value) < 0) return;
                                            setOrderDiscount(value);
                                        }}
                                    />
                                </div>
                                <div className="ds-summary-row mt-2 mb-2">
                                    <label className="ds-summary-label d-flex align-items-center m-0" style={{cursor: 'pointer'}}>
                                        <input
                                            type="checkbox"
                                            className="mr-2"
                                            disabled={total <= 0}
                                            onChange={(e) => {
                                                if (e.target.checked) {
                                                    const fractionalPart = total % 1;
                                                    setOrderDiscount(fractionalPart?.toFixed(2));
                                                } else {
                                                    setOrderDiscount(0);
                                                }
                                            }}
                                        />
                                        Apply Fractional Discount
                                    </label>
                                </div>
                                <div className="ds-summary-row ds-summary-total">
                                    <span className="ds-summary-label">Total:</span>
                                    <span className="ds-summary-value" style={{color: '#4F46E5'}}>{updateTotal}</span>
                                </div>
                                
                                <div className="ds-summary-row mt-3">
                                    <span className="ds-summary-label">Paid:</span>
                                    <input
                                        type="number"
                                        className="ds-summary-input"
                                        placeholder="0.00"
                                        min={0}
                                        disabled={total <= 0}
                                        value={paid}
                                        onChange={(e) => {
                                            const value = e.target.value;
                                            if (parseFloat(value) < 0) return;
                                            setPaid(value);
                                        }}
                                    />
                                </div>
                                <div className="ds-summary-row">
                                    <span className="ds-summary-label text-danger">Due:</span>
                                    <span className="ds-summary-value text-danger">{due}</span>
                                </div>
                                {parseFloat(change) > 0 && (
                                    <div className="ds-summary-row text-success mt-1">
                                        <span className="ds-summary-label">Change:</span>
                                        <span className="ds-summary-value">{change}</span>
                                    </div>
                                )}
                            </div>
                            
                            <div className="row mt-4 mb-2 px-1">
                                <div className="col-6 pr-2">
                                    <button
                                        onClick={() => cartEmpty()}
                                        type="button"
                                        className="btn btn-block text-white font-weight-bold"
                                        style={{
                                            background: 'linear-gradient(135deg, #ff6b6b 0%, #ee5253 100%)', 
                                            borderRadius: '12px',
                                            padding: '12px 10px',
                                            boxShadow: '0 4px 15px rgba(238, 82, 83, 0.35)',
                                            border: 'none',
                                            letterSpacing: '0.5px',
                                            textTransform: 'uppercase',
                                            fontSize: '15px',
                                            transition: 'all 0.3s ease'
                                        }}
                                        onMouseOver={(e) => e.currentTarget.style.transform = 'translateY(-2px)'}
                                        onMouseOut={(e) => e.currentTarget.style.transform = 'translateY(0)'}
                                    >
                                        <i className="fas fa-trash-alt mr-2"></i> Clear Cart
                                    </button>
                                </div>
                                <div className="col-6 pl-2">
                                    <button
                                        onClick={() => orderCreate()}
                                        type="button"
                                        className="btn btn-block text-white font-weight-bold"
                                        style={{
                                            background: 'linear-gradient(135deg, #4834d4 0%, #686de0 100%)', 
                                            borderRadius: '12px',
                                            padding: '12px 10px',
                                            boxShadow: '0 4px 15px rgba(104, 109, 224, 0.35)',
                                            border: 'none',
                                            letterSpacing: '0.5px',
                                            textTransform: 'uppercase',
                                            fontSize: '15px',
                                            transition: 'all 0.3s ease'
                                        }}
                                        onMouseOver={(e) => e.currentTarget.style.transform = 'translateY(-2px)'}
                                        onMouseOut={(e) => e.currentTarget.style.transform = 'translateY(0)'}
                                    >
                                        <i className="fas fa-check-circle mr-2"></i> Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {/* PRODUCT PANEL (RIGHT) */}
                    <div className="col-lg-7">
                        <div className="ds-pos-product-panel">
                            <div className="row mb-4">
                                <div className="col-md-6 mb-3 mb-md-0">
                                    <div className="ds-pos-search">
                                        <i className="fas fa-barcode ds-pos-search-icon"></i>
                                        <input
                                            type="text"
                                            className="form-control form-control-lg"
                                            placeholder="Enter Product Barcode"
                                            value={searchBarcode}
                                            autoFocus
                                            onChange={(e) => setSearchBarcode(e.target.value)}
                                        />
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="ds-pos-search">
                                        <i className="fas fa-search ds-pos-search-icon"></i>
                                        <input
                                            type="text"
                                            className="form-control form-control-lg"
                                            placeholder="Enter Product Name"
                                            value={searchQuery}
                                            onChange={(e) => setSearchQuery(e.target.value)}
                                        />
                                    </div>
                                </div>
                            </div>
                            
                            <div className="row" style={{maxHeight: 'calc(100vh - 180px)', overflowY: 'auto', padding: '10px 5px'}}>
                                {products.length > 0 &&
                                    products.map((product, index) => (
                                        <div
                                            onClick={() => addProductToCart(product.id)}
                                            className="col-6 col-md-4 col-xl-3 mb-4"
                                            key={index}
                                        >
                                            <div className="ds-pos-product-card">
                                                <img
                                                    src={`${fullDomainWithPort}/storage/${product.image}`}
                                                    alt={product.name}
                                                    className="ds-pos-product-img"
                                                    onError={(e) => {
                                                        e.target.onerror = null;
                                                        e.target.src = `${fullDomainWithPort}/assets/images/no-image.png`;
                                                    }}
                                                />
                                                <div className="ds-pos-product-name" title={product.name}>
                                                    {product.name}
                                                </div>
                                                <div className="ds-pos-product-qty mb-1">Stock: {product.quantity}</div>
                                                <div className="ds-pos-product-price">
                                                    ৳{product?.discounted_price || product?.price}
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                            </div>
                            {loading && (
                                <div className="ds-loading-more">
                                    <i className="fas fa-spinner fa-spin mr-2"></i> Loading products...
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
            <Toaster position="top-right" reverseOrder={false} />
        </>
    );
}