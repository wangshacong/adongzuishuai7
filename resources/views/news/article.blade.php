<!DOCTYPE html>
<!-- saved from url=(0031)http://www.readjp.com/1958.html -->
<html lang="zh-CN" class="js no-svg" style="font-size:20px;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="shortcut icon" href="http://www.readjp.com/favicon.ico">

    <link type="text/css" media="all" href="/css/autoptimize_ee9d79110222d655e9350d2e553347d0.css" rel="stylesheet">
    <title>{{$content['title']}}</title>
    <link rel="prev" title="" href="">
    <link rel="next" title=""href="">
    <link rel="canonical">
    <meta name="keywords" content="新闻">
    <meta name="description" content="{{$content['title']}}">
    <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>

    <!-- Core CSS -->




    <!--[if lt IE 9]>
    <link href="http://www.readjp.com/wp-content/themes/MoonUi/assets/css/ie8.css?ver=2.0" rel="stylesheet">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://www.readjp.com/wp-content/themes/MoonUi/assets/js/html5.js?ver=3.7.3"></script>
    <![endif]-->
</head>

<body class="post-template-default single single-post postid-1958 single-format-standard has-sidebar">

    @include('gong.head')



    <div id="page" class="container">
        <div class="row">



            <div class="col-md-12 breadcrumbs">当前位置：<a href="/">首页</a> <small>&gt;</small> <a href="http://www.readjp.com/news">新闻</a>
                <small>&gt;</small> 正文</div>

            <div class="main-let col-md-8">
                <main id="single-main" class="single-main" role="main">

                    <!--begin-->

                    <header class="article-header clearfix">
                        <h1 class="article-title smbpx">{{$content['title']}}</h1>
                        <div class="article-meta smbpx">
                            <span class="item">
                                <!--原文发布：-->{{$content['create_time']}}</span>
                            <span class="item">来源：{{$content['zuozhe']}}</span>
                        </div>
                    </header>
                    <?php 
                    echo $content['content']  
                   ?>


                


                    <!--end-->

                    <div class="article-tags smbpx"></div>





                    <div class="relates smbpx">
                        <h3 class="widget-title"><span>相关推荐</span></h3>
                        <ul class=" common-artlist  clearfix">
                            <?php 
                                $article = \DB::Table('article7s')->orderBy('id','desc')->where('fenlei_id',$content['fenlei_id'])->limit(5)->get();
                            ?>
                            @foreach($article as $v)
                            <li class="col-md-3 col-sm-3 col-xs-4"><a class="related-title" href="/airticle/{{$v->id}}">{{$v->title}}</a><span
                                    class="post-data">{{$v->create_time}}</span></li>
                            @endforeach
                        </ul>
                    </div>



                </main>
            </div>


            <div class="main-right col-md-4">

                <aside id="secondary" class="widget-area" role="complementary" aria-label="Sidebar">


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
                            <li><a href="/article/{{$v->id}}"><span class="thumbnail"><img data-thumb="default" src="{{$v->news_pic}}"
                                            class="thumb"></span><span class="title thumbnail-title">{{$v->title}}</span></a><span
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

    <script type="text/javascript" defer="" src="/images/autoptimize_7d16115031181cabae725e5dcf559746.js.下载"></script>


    <!-- Dynamic page generated in 4.704 seconds. -->
    <!-- Cached page generated by WP-Super-Cache on 2019-01-16 12:44:43 -->

    <!-- super cache -->
</body>

</html>