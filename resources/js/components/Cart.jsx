import axios from "axios";
import React, { useState, useEffect } from "react";
import toast, { Toaster } from "react-hot-toast";
import Swal from "sweetalert2";
import SuccessSound from "../sounds/beep-07a.mp3";
import WarningSound from "../sounds/beep-02.mp3";
import playSound from "../utils/playSound";

export default function Cart({ carts, setCartUpdated, cartUpdated }) {
    function increment(id) {
        axios
            .put("/admin/cart/increment", {
                id: id,
            })
            .then((res) => {
                setCartUpdated(!cartUpdated);
                playSound(SuccessSound);
                toast.success(res?.data?.message);
            })
            .catch((err) => {
                playSound(WarningSound);
                toast.error(err.response.data.message);
            });
    }
    function decrement(id) {
        axios
            .put("/admin/cart/decrement", {
                id: id,
            })
            .then((res) => {
                setCartUpdated(!cartUpdated);
                playSound(SuccessSound);
                toast.success(res?.data?.message);
            })
            .catch((err) => {
                playSound(WarningSound);
                toast.error(err.response.data.message);
            });
    }
    function destroy(id) {
        Swal.fire({
            title: "Are you sure you want to delete this item?",
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
                    .put("/admin/cart/delete", {
                        id: id,
                    })
                    .then((res) => {
                        console.log(res);
                        setCartUpdated(!cartUpdated);
                        playSound(SuccessSound);
                        toast.success(res?.data?.message);
                    })
                    .catch((err) => {
                        toast.error(err.response.data.message);
                    });
            } else if (result.isDenied) {
                return;
            }
        });
    }
    return (
        <>
            <div className="ds-cart-items-wrapper">
                {carts.length === 0 ? (
                    <div className="text-center text-muted mt-5">
                        <i className="fas fa-shopping-cart fa-3x mb-3" style={{opacity: 0.2}}></i>
                        <p>Your cart is empty</p>
                    </div>
                ) : (
                    carts.map((item) => (
                        <div key={item.id} className="ds-cart-item">
                            <div className="ds-cart-item-name" title={item.product.name}>
                                {item.product.name}
                            </div>
                            
                            <div className="ds-qty-wrapper mx-2">
                                <button className="ds-qty-btn" onClick={() => decrement(item.id)}>
                                    <i className="fas fa-minus"></i>
                                </button>
                                <input
                                    type="text"
                                    className="ds-qty-input"
                                    value={item.quantity}
                                    disabled
                                />
                                <button className="ds-qty-btn" onClick={() => increment(item.id)}>
                                    <i className="fas fa-plus"></i>
                                </button>
                            </div>
                            
                            <div className="ds-cart-item-price">
                                {item?.row_total}
                            </div>
                            
                            <button className="ds-cart-delete-btn ml-2" onClick={() => destroy(item.id)}>
                                <i className="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    ))
                )}
            </div>
            <Toaster position="top-right" reverseOrder={false} />
        </>
    );
}
