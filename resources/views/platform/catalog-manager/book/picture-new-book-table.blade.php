<style>
    .item {
        position:relative;
        padding-top:20px;
        display:inline-block;
    }
    .notify-badge{
        position: absolute;
        right:-20px;
        top:10px;
        background:red;
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color:white;
        padding:5px 10px;
        font-size:8px;
    }

    .picture{
        width: 40px;
        height: 60px;
    }
</style>
<div class="item">
    <a href="#">
        <span class="notify-badge">Nuevo</span>
        <img src={{ $path }} alt='sample' class='picture'>
    </a>
</div>
