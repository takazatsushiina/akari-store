


<?php $__env->startSection('title', 'Notifikasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-bell"></i> Notifikasi</h2>
    <?php if($notifications->where('is_read', false)->count() > 0): ?>
        <form action="<?php echo e(route('notifications.read-all')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-check-all"></i> Tandai Semua Dibaca
            </button>
        </form>
    <?php endif; ?>
</div>

<div class="card shadow">
    <div class="card-body">
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="d-flex justify-content-between align-items-start p-3 border-bottom <?php echo e(!$notification->is_read ? 'bg-light' : ''); ?>">
                <div class="d-flex">
                    <div class="me-3">
                        <span class="badge bg-<?php echo e($notification->type_class); ?> rounded-circle p-2">
                            <i class="bi bi-<?php echo e($notification->type == 'success' ? 'check' : ($notification->type == 'warning' ? 'exclamation' : ($notification->type == 'danger' ? 'x' : 'info'))); ?>"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-1 <?php echo e(!$notification->is_read ? 'fw-bold' : ''); ?>"><?php echo e($notification->title); ?></h6>
                        <p class="mb-1 text-muted"><?php echo e($notification->message); ?></p>
                        <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <?php if(!$notification->is_read): ?>
                        <form action="<?php echo e(route('notifications.read', $notification->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-outline-success" title="Tandai dibaca">
                                <i class="bi bi-check"></i>
                            </button>
                        </form>
                    <?php endif; ?>
                    <form action="<?php echo e(route('notifications.destroy', $notification->id)); ?>" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-5">
                <i class="bi bi-bell-slash" style="font-size: 4rem; color: #ccc;"></i>
                <p class="mt-3 text-muted">Tidak ada notifikasi.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php echo e($notifications->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\akari-store\resources\views/notifications/index.blade.php ENDPATH**/ ?>