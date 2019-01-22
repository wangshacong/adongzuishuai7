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
    <title>南京实创新闻</title>
    <meta name="keywords" content="南京实创,新闻">
    <meta name="description" content="南京实创新闻">
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
                    <h1 class="page-title"><i class="fa fa-list" aria-hidden="true"></i>新闻</h1>
                </header>

                <main id="main">

                    <?php 
                        $article = \DB::Table('article7s')->orderBy('id','desc')->paginate(10);
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
                        $hot_article = \DB::Table('article7s')->orderBy('dianji','desc')->limit(6)->get();
                        $pic_article = \DB::Table('article7s')->orderBy('dianji','desc')->where('news_pic','<>','')->limit(5)->get();
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


    <!--footer-->
    @include('gong.footer')


    <!-- Core JS -->






    <!--黑色遮罩层-->
    <div class="m-mask"></div>





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