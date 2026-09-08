@extends('backend.master')

@section('title', 'All Notifications')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Notifications History</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('backend.admin.notifications.markAllAsRead') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-check-double mr-1"></i> Mark All as Read
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($notifications as $notification)
                                <li class="list-group-item d-flex justify-content-between align-items-center {{ $notification->read_at ? 'bg-white' : 'bg-light' }}" style="padding: 1rem 1.5rem; transition: background-color 0.2s ease;">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3 text-center" style="width: 40px; height: 40px; line-height: 40px; border-radius: 50%; background-color: {{ $notification->read_at ? '#f8f9fa' : '#e0e7ff' }}; color: {{ $notification->read_at ? '#6c757d' : '#4f46e5' }};">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 {{ $notification->read_at ? 'text-muted' : 'font-weight-bold text-dark' }}">
                                                <a href="{{ route('backend.admin.notifications.read', $notification->id) }}" class="text-decoration-none text-inherit" style="color: inherit;">
                                                    {{ $notification->data['message'] ?? 'System Notification' }}
                                                </a>
                                            </p>
                                            <small class="text-muted">
                                                <i class="far fa-clock mr-1"></i> {{ $notification->created_at->format('M d, Y - h:i A') }} 
                                                ({{ $notification->created_at->diffForHumans() }})
                                            </small>
                                        </div>
                                    </div>
                                    @if(is_null($notification->read_at))
                                        <span class="badge badge-primary badge-pill">New</span>
                                    @endif
                                </li>
                            @empty
                                <li class="list-group-item text-center p-5 text-muted">
                                    <i class="far fa-bell-slash fa-3x mb-3 text-light"></i>
                                    <h5>No notifications found</h5>
                                    <p class="mb-0">You don't have any notifications in your history yet.</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    @if($notifications->hasPages())
                    <div class="card-footer bg-white border-top-0 pt-3">
                        <div class="d-flex justify-content-center">
                            {{ $notifications->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
