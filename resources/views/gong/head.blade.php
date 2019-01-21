<header class="header clearfix">
        <div class="container clearfix">

            <!-- headerbar -->
            <div class="headerbar">
                <h1 class="logo"><a href="/" style="display:block;height:50px;" title=""><img
                            src="/images/nanjing.png" alt="" width="100%" height="100%" style="max-height:100px;"></a></h1>
                <ul class="site-nav">
                    <li id="menu-item-1287" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-1287"><a
                            href="/">首页</a></li>
                            @foreach($fenlei as $v)
                    <li id="menu-item-1289" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1289"><a
                            href="/fenlei/{{$v['id']}}">{{$v->fenlei_name}}</a></li>
                            @endforeach
                </ul>
            </div>

        </div>
    </header>