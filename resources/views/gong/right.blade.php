<div class="m-aside">
        <div class="m-ad2" id="ad_02">
        </div>
        <!-- 广东新闻 -->
        <?php 
            $gdjx = \DB::Table('fenlei3s')->where('fenlei_name','广东精选')->first();
            $gdjx_article = \DB::Table('article3s')->orderBy('id','desc')->where('fenlei_id',$gdjx->id)->limit(8)->get();
        ?>
        <div class="m-ttyb">
            <div class="m-tit m-ztit f-cb">
                <a href="/fenlei/{{$gdjx->id}}" target="_balnk">
                    <h2 class="f-cb">{{$gdjx->fenlei_name}}</h2>
                </a>
                <a href="/fenlei/{{$gdjx->id}}" target="_balnk" class="more">更多</a>
            </div>
            <ul class="m-list2 j-lists2">
                @foreach($gdjx_article as $v)
                <li><a href="/article/{{$v->id}}">{{$v->title}}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- 科技专区 -->
        <div class="m-nfwp">
            <?php 
            $kj = \DB::Table('fenlei3s')->where('fenlei_name','科技')->first();
            $kj_article = \DB::Table('article3s')->orderBy('id','desc')->where('fenlei_id',$kj->id)->limit(10)->get();
            ?>
            <div class="m-tit m-ztit f-cb">
                <a href="/fenlei/{{$v->id}}" target="_balnk">
                    <h2 class="f-cb">{{$kj->fenlei_name}}</h2>
                </a>
                <a href="/fenlei/{{$v->id}}" target="_balnk" class="more">更多</a>
            </div>
            <ul class="m-list2 j-lists">
                @foreach($kj_article as $v)
                <li data-pubtime="{{$v->create_time}}"><a href="/article/{{$v->id}}" target="_blank">{{$v->title}}</a></li>
                @endforeach
            </ul>
        </div>

    </div>