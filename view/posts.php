<?php include('layouts/header.php'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog Home
            <small>By Litte Lite MVC Example</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Home</a>
            </li>
            <li class="active">Blog Home</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<?php for ($p = 0; $p <= 9; $p++): ?>
<!-- Blog Post Row -->
<div class="row">
    <div class="col-md-1 text-center">
        <p><i class="fa fa-file-text fa-4x"></i>
        </p>
        <p><?=date("M d, Y")?></p>
    </div>
    <div class="col-md-5">
        <a href="#">
            <img class="img-responsive img-hover" src="http://loremflickr.com/600/300/dog?random=<?=$p?>" alt="Image <?=$p?>">
        </a>
    </div>
    <div class="col-md-6">
        <h3><a href="/index.php?PostController/postView/<?=$posts[$p]['id']?>"><?=strtoupper($posts[$p]['title'])?></a>
        </h3>
        <p>by <a href="/index.php?PostController/postView/<?=$posts[$p]['id']?>">Litte Lite MVC Example</a></p>
        <p><?=$posts[$p]['body']?></p>
        <a class="btn btn-primary" href="/index.php?PostController/postView/<?=$posts[$p]['id']?>">Read More <i class="fa fa-angle-right"></i></a>
    </div>
</div>
<!-- /.row -->
<hr>
<?php endfor; ?>

<!-- Pager -->
<div class="row">
    <ul class="pager">
        <li class="previous"><a href="#">&larr; Older</a>
        </li>
        <li class="next"><a href="#">Newer &rarr;</a>
        </li>
    </ul>
</div>
<!-- /.row -->

<?php include('layouts/footer.php'); ?>
