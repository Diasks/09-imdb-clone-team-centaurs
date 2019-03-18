       

    
<?php $__env->startSection('content'); ?>  
<div class="links">
                  
                   <a href="https://laracasts.com">Laracasts</a>
                   <a href="https://laravel-news.com">News</a>
                   <a href="https://forge.laravel.com">Forge</a>
                   <a href="https://github.com/laravel/laravel">GitHub</a>
               </div>

       <h1>FEATURED MOVIES</h1>
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="/movie/<?php echo e($movie->id); ?>"> 
    <img src="http://image.tmdb.org/t/p/w185//<?php echo e($movie->poster_path); ?>"/>
    </a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
   
    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
   <h2> <?php echo e($review->author); ?></h2>
   <p> <?php echo e($review->content); ?></p>
   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $__env->stopSection(); ?>

  






<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>