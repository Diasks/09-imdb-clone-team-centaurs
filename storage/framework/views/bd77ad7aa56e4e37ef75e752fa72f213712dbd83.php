<?php $__env->startSection('content'); ?>


<div class="jumbotron jumbotron-fluid bg-info">
    <div class="container">
        <h1 class="display-4">FEATURED MOVIES</h1>
        <?php $__currentLoopData = $movies;
        $__env->addLoop($__currentLoopData);
        foreach ($__currentLoopData as $movie): $__env->incrementLoopIndices();
            $loop = $__env->getLastLoop(); ?>

            <a href="/movie/<?php echo e($movie->id); ?>">
                <img src="http://image.tmdb.org/t/p/w185//<?php echo e($movie->poster_path); ?>"
                     class="shadow p-3 mb-5 bg-white rounded"/>

            </a>

        <?php endforeach;
        $__env->popLoop();
        $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<h2>LATEST REVIEWS</h2>

<?php $__currentLoopData = $reviews;
$__env->addLoop($__currentLoopData);
foreach ($__currentLoopData as $review): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-header">
            <h5>User: <?php echo e($review->author); ?></h5>
        </div>
        <div class="card-body">
            <p class="card-text">
            <p> <?php echo e($review->content); ?></p>
        </div>
    </div>
<?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.app',
    \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>