<!DOCTYPE html>
<!-- saved from url=(0026)http://www.readjp.com/news -->
<html lang="zh-CN" class="js no-svg" style="font-size:20px;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="shortcut icon" href="http://www.readjp.com/favicon.ico">

    <link type="text/css" media="all" href="/css/autoptimize_ee9d79110222d655e9350d2e553347d0.css" rel="stylesheet">
    <title>{{$dangqian_fenlei['fenlei_name']}}</title>
    <meta name="keywords" content="{{$dangqian_fenlei['fenlei_name']}}">
    <meta name="description" content="{{$dangqian_fenlei['fenlei_name']}}">
    <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>

    <!-- Core CSS -->




    <!--[if lt IE 9]>
    <link href="http://www.readjp.com/wp-content/themes/MoonUi/assets/css/ie8.css?ver=2.0" rel="stylesheet">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://www.readjp.com/wp-content/themes/MoonUi/assets/js/html5.js?ver=3.7.3"></script>
    <![endif]-->
</head>

<body class="archive category category-news category-192 hfeed has-sidebar page-two-column">

    @include('gong.head')


    <div class="site-search">
        <div class="container">
            <form method="get" class="site-search-form" action="http://www.readjp.com/index.php">
                <input class="search-input" name="s" type="text" placeholder="输入关键字" value="">
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>


    <div id="page" class="container">
        <div class="row">

            <div class="main-let col-md-8">

                <header class="page-header">
                    <h1 class="page-title"><i class="fa fa-list" aria-hidden="true"></i>{{$dangqian_fenlei['fenlei_name']}}</h1>
                </header>

                <main id="main">

                    <?php 
                        $article = \DB::Table('article7s')->orderBy('id','desc')->where('fenlei_id',$dangqian_fenlei['id'])->paginate(10);
                    ?>
                    @foreach($article as $v)
                    <article id="post-1958" class="post-1958 post type-post status-publish format-standard hentry category-news">

                        <div class="list-img-loaded">
                            <a href="/article/{{$v->id}}">
                                <img data-thumb="default" src="{{$v->news_pic}}" class="thumb">
                            </a>
                        </div>

                        <div class="list-intro">
                            <header class="list-art-header">
                                <h2 class="post-title"><a href="/article/{{$v->id}}" title="{{$v->title}}">{{$v->title}}</a></h2>
                            </header>

                            <div class="list-art-content">
                                <p class="meta"><time>{{$v->create_time}}</time><span class="from hidden-xs">来源：{{$v->zuozhe}}</span><a class="action action-link" href="/article/{{$v->id}}"><i class="fa fa-location-arrow"></i>原文直达链接</a></p>
                                <p class="note hidden-xs">{{mb_substr(preg_replace('/<.*?>/','',$v->content),0,100)}}</p>
                            </div>
                        </div>


                    </article>
                    @endforeach

                    <nav class="navigation pagination" role="navigation">
                        <h2 class="screen-reader-text">文章导航</h2>
                        <div class="nav-links">
                            {{$article->appends(request()->all())->links()}}
                        </div>
                    </nav>
                </main>

            </div>


            <div class="main-right col-md-4">



                <!-- 快讯 -->
                <section class="widget sidebar-time-line">
                    <h2 class="widget-title"><span>热门点击</span></h2>
                    <?php 
                        $hot_article = \DB::Table('article7s')->orderBy('dianji','desc')->where('fenlei_id',$dangqian_fenlei['id'])->limit(6)->get();
                        $pic_article = \DB::Table('article7s')->orderBy('dianji','desc')->where('fenlei_id',$dangqian_fenlei['id'])->where('news_pic','<>','')->limit(5)->get();
                    ?>
                    <div class="panel-group sidebar-time-line" id="accordion">
                        @foreach($hot_article as $v)
                        <div class="panel panel-time">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="/article/{{$v->id}}">{{$v->title}}</a></h4>
                            </div>
                            <p class="meta">
                                <span class="time">{{$v->create_time}}</span>
                            </p>
                        </div>
                        @endforeach
                    </div>
                </section>

                <section id="widget_ui_sticky-2" class="widget widget_ui_posts">
                    <h2 class="widget-title"><span>推荐阅读</span></h2>
                    <ul class="sidebar-sticky ">
                        @foreach($pic_article as $v)
                        <li><a href="/article/{{$v->id}}"><span class="thumbnail"><img data-thumb="default" src="{{$v->news_pic}}" class="thumb"></span><span class="title thumbnail-title">{{$v->title}}</span></a><span
                                class="muted">{{$v->create_time}}</span></li>
                        @endforeach
                    </ul>
                </section>

                </aside>
            </div>


        </div>
    </div>


   @include('gong.footer')


    <!--浮动图标-->
    <div class="rollbar hidden-xs" style="display:block;">
        <ul>
            <li><a href="javascript:(scrollTo());"> <i class="fa fa-angle-up"></i></a>
                <h6>去顶部<i></i></h6>
            </li>
        </ul>
    </div>


    <!-- 小模态框 -->
    <div class="modal fade modal-wechat" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" style="margin-top:200px;width:340px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" style="text-align:center;font-size:15px;">关注公众号</h4>
                </div>
                <div class="modal-body modal-wechat-item">
                    <p><img src="/images/QRcode.jpg" width="230" height="230" style=""></p>
                    <p><span>公众号：培讯</span><br>每天5分钟，快速了解日本新鲜事儿</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Large modal <a onclick="ShowMessage('224');"></a> -->
    <div class="modal fade MessgeModalLabel" id="MessgeModal" tabindex="-1" role="dialog" aria-labelledby="MessgeModalLabel">
        <div class="modal-dialog modal-lg" style="width:96%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" style="text-align:center">原文阅读</h4>
                </div>
                <div class="modal-body">
                    <iframe src="/images/saved_resource.html" id="Messageiframe" class="Messageiframe" width="100%"
                        height="450px" frameborder="0" scrolling="auto" onload="iFrameHeight()"></iframe>
                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->






    <!--黑色遮罩层-->
    <div class="m-mask"></div>


    <!--wap菜单-->
    <ul class="m-navbar">
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-1287"><a
                href="http://www.readjp.com/news">新闻</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1289"><a href="http://www.readjp.com/life">生活</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1285"><a href="http://www.readjp.com/ent">娱乐</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1291"><a href="http://www.readjp.com/tech">科技</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1288"><a href="http://www.readjp.com/fashion">时尚</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1292"><a href="http://www.readjp.com/travel">旅游</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1283"><a href="http://www.readjp.com/anime">动漫</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1290"><a href="http://www.readjp.com/liuxue">留学</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1284"><a href="http://www.readjp.com/huaren">华人</a></li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1286"><a href="http://www.readjp.com/culture">文化</a></li>
    </ul>


    <script>
        window.systemconfig = {
            uri: 'http://www.readjp.com/wp-content/themes/MoonUi',
            ver: '2.0',
            ajaxpager: '5',
            user_resetpasswordpage: '',
        };

        function ShowMessage(ID) {
            // $('#Messageiframe').attr("src", ID);  
            $(Messageiframe).attr("src", "/mp/reader.php?action=iframe&mopostreader=" + ID);
            $('#MessgeModal').modal('show');
        }

        function iFrameHeight() {
            var iFrame = document.getElementById("Messageiframe");
            // var iFhight = window.screen.height - 118;
            var iFhight = window.innerHeight - 115;
            document.getElementById("Messageiframe").height = iFhight + 'px';
        }

        var cw = $(".relates-thumb-img").width() * 0.66;
        $(".relates-thumb-img").css({
            "height": cw + "px"
        });
        $(window).resize(function () {
            var cw = $(".relates-thumb-img").width() * 0.66;
            $(".relates-thumb-img").css({
                "height": cw + "px"
            });
        });
    </script>

    <script type="text/javascript" defer="" src="/js/autoptimize_7d16115031181cabae725e5dcf559746.js"></script>


    <!-- Dynamic page generated in 3.438 seconds. -->
    <!-- Cached page generated by WP-Super-Cache on 2019-01-16 14:13:29 -->

    <!-- super cache -->
</body>

</html>