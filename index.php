<!DOCTYPE html>
<html lang="zh-cn" ng-app="yadamusic">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>源码哥音乐平台-[原创作品]PHP源码</title>
    <meta name="description" content="源码哥音乐平台-免费下载更多音乐v1.0版本 -- QQ:9838541">
    <meta name="keywords" content="音乐,媒体,下载,音乐搜索,搜索,API,接口,PHP">
    <link href="temp/style/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="temp/style/style.css">
    <link rel="stylesheet" href="temp/style/layer.css">
    <script src="temp/js/angular.js"></script>
    <script src="temp/js/angular-ui-bootstrap.js"></script>
    <script src="temp/js/angular-route.js"></script>
    <script src="temp/js/js.js"></script>
    <script src="temp/js/jquery-1.9.1.min.js"></script>
    <script src="temp/js/bootstrap.js"></script>
    <script src="temp/js/loading-bar.js"></script>
    <script src="temp/js/clipboard.js"></script>
    <script src="temp/js/layer.js"></script>
</head>
<body>
<div class="main" ng-controller="indexController">
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">导航按钮</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../../admin">源码哥音乐平台</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../Config/ses.php"><span id="logout" class="glyphicon glyphicon-music"></span>  音乐播放器</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container music-box text-center">
        <header class="bottom-border">
            <h2><b>音乐直链搜索</b></h2>
            <p>特制多站合一音乐搜索解决方案</p>
        </header>
    </div>
    <form method="post">
        <div class="tabbox col-lg-offset-2 col-sm-8 ">

            <ul class="nav nav-tabs nav-justified" style="padding-top: 50px;border:0px;margin-bottom: 30px;">

                <li class="text-center">
                    <a href="#mname" data-toggle="tab" style="border-radius: 0px;">
                        歌手名称
                    </a>
                </li>
<!--                 <li class="text-center">
                    <a href="#musicid" data-toggle="tab" style="border-radius: 0px;">音乐ID</a>
                </li>
                <li class="text-center">
                    <a href="#musicurl" data-toggle="tab" style="border-radius: 0px;">音乐地址</a>
                </li> -->
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="mname">
                    <div class="form-group" >
                        <input type="text" id="musicname" class="form-control col-lg-2 col-md-3 col-sm-12 text-center" placeholder="例如：后来 刘若英" style="height: 50px;" value="刘若英">
                    </div>
                    <button type="button" class="btn btn-primary col-lg-12 col-sm-12 col-md-12" style="height:50px;margin-top: 30px;margin-bottom: 30px;width: 100%;" ng-click="ting()">点击我，跟我一起听</button>
                </div>
<!--                 <div class="tab-pane fade" id="musicid">
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-5 text-center" placeholder="例如：ID:25906124" style="height: 50px;">
                    </div>
                    <button id="dianji" type="button" class="btn btn-primary col-lg-12 col-sm-12" style="width: 100%;height:50px;margin-top: 30px;margin-bottom: 30px;">点击我，跟我一起嗨</button>
                </div>
                <div class="tab-pane fade" id="musicurl">
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-5 text-center" placeholder="例如：http://music.163.com/#/song?id=25906124" style="height: 50px;">
                    </div>
                    <button id="dianji" type="button" class="btn btn-primary col-lg-12 col-sm-12" style="width: 100%;height:50px;margin-top: 30px;margin-bottom: 30px;">点击我，跟我一起下</button>
                </div> -->
            </div>

            <div class="musiclist" id="mulist" style="display: none">

                <table class="table table-bordered table-hover" style="border-radius: 5px">
                    <thead>
                    <tr class="text-center">
                        <td>歌手名称</td>
                        <td>歌曲名称</td>
                        <td>歌曲id</td>
                        <!-- <td>歌曲播放</td> -->
                        <td>文件下载</td>
                        <td>歌词下载</td>
                    </tr>
                    </thead>
                    <tbody ng-repeat="song in songlist">
                    <tr class="text-center">
                        <td  ng-bind="song.artistname"></td>
                        <td ng-bind="song.songname"></td>
                        <td ng-bind="song.songid"></td>
                        <!-- <td><a ng-click="" style="display: block"><span class="glyphicon glyphicon-music"></span>&nbsp;试听</a></td> -->
                        <td><a href="" ng-click="download(song.songid)" style="display: block" id="durl"><span class="glyphicon glyphicon-save"></span>&nbsp;下载</a></td>
                        <td><a ng-click="dllrc(song.songid)" style="display: block"><span class="glyphicon glyphicon-save"></span>&nbsp;下载</a></td>
                    </tr>

                    </tbody>
                </table>
                <button class="col-lg-12 col-md-12 col-sm-12 text-center btn btn-default" style="height:50px;width: 100%;" id="gdjc">更多精彩</button>

            </div>










<!--            <div class="row">-->
<!--                <div class="col-sm-6 col-md-3" style="margin-top: 30px;">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="http:\/\/qukufile2.qianqian.com\/data2\/pic\/e47841aec86f1590247b55f428bc457c\/173209\/173209.jpg" alt="">-->
<!--                        <div class="caption">-->
<!--                            <h3 ng-bind="song"></h3>-->
<!--                            <p>...</p>-->
<!--                            <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-music"></span>  试听</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span> 下载</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-6 col-md-3" style="margin-top: 30px;">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="http:\/\/qukufile2.qianqian.com\/data2\/pic\/9f402b34790e97b18211f57c7bcf6b14\/71971\/71971.jpg" alt="">-->
<!--                        <div class="caption">-->
<!--                            <h3>Thumbnail label</h3>-->
<!--                            <p>...</p>-->
<!--                            <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-music"></span>  试听</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span>下载</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-6 col-md-3" style="margin-top: 30px;">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="http:\/\/qukufile2.qianqian.com\/data2\/pic\/aded9221e66f24915f7d299269d4c9e9\/73072\/73072.jpg" alt="">-->
<!--                        <div class="caption">-->
<!--                            <h3>Thumbnail label</h3>-->
<!--                            <p>...</p>-->
<!--                            <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-music"></span>  试听</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span>下载</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-6 col-md-3" style="margin-top: 30px;">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="http:\/\/qukufile2.qianqian.com\/data2\/pic\/e47841aec86f1590247b55f428bc457c\/173209\/173209.jpg" alt="">-->
<!--                        <div class="caption">-->
<!--                            <h3>Thumbnail label</h3>-->
<!--                            <p>...</p>-->
<!--                            <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-music"></span>  试听</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span>下载</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>

    </form>
</div>

</body>
</html>