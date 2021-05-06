<div class="col-xs-12">
<nav class="breadcrumbs">
<?php if(isset($breadcrumbs) && is_array($breadcrumbs) && next($breadcrumbs)): ?>
    <ul>
    <?php foreach ($breadcrumbs as $key=>$value): ?>

    <?php if (!(end($breadcrumbs)===$value)): ?>
        <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
            <a href="<?php echo $value?>" itemprop="url">
        <span itemprop="title">
          <?php echo $key?></span>
            </a>
        </li>

    <?php else: ?>
        <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
      <span itemprop="title">
        <?php echo $key?></span>
        </li>
    <?php endif; ?>

    <?php endforeach; ?>
    </ul>
<?php endif; ?>
</nav>
</div>