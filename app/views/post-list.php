<?php for ($p = 0; $p <= 9; $p++): ?>
    <li><a href="/post/detail/<?=$posts[$p]['id']?>"><?=$posts[$p]['title']?></a><hr></li>
<?php endfor; ?>