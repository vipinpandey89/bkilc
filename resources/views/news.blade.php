@extends('website-layout.header')

@section('content')

<div id="Banner_wrapper" class="bg-parallax category-news" style="background-image:url({{url('website/images/fascione-news.jpg')}});">
  <div id="Subheader">
   <div class="container">
    <div class="inner_banner_title">
     <h1 class="title">News</h1>
   </div>
 </div>
</div>
</div>
<div id="Content">
  <div id="category-news_section" class="section timeline">
    <div class="container">
      <div class="row">

            @foreach($getnews as $newsDetail)
                  <div class="post-item isotope-item clearfix">
                    <div class="date_label">{{date('d-m-Y',strtotime($newsDetail->created_at))}}</div>

                    @if(!empty($newsDetail->image))
                    <div class="image_frame post-photo-wrapper image">
                      <div class="image_wrapper">
                        <a href="{{url('news-detail/'.$newsDetail->id)}}">
                          <img width="960" height="699" src="{{url('images/news/'.$newsDetail->image)}}" class="img-responsive wp-post-image" alt="">
                        </a>
                      </div>
                    </div>
                    @endif

                    <div class="post-desc-wrapper">
                      <div class="post-desc">
                        <div class="post-title">
                          <h2 class="entry-title"><a href="{{url('news-detail/'.$newsDetail->id)}}">{{$newsDetail->title}}</a></h2>
                        </div>
                        <div class="post-excerpt"><p class="big">{{strip_tags(substr($newsDetail->description,0,200))}}</p></div>
                        <div class="post-footer">
                          <div class="post-links"><i class="fa fa-file-text-o"></i> <a href="{{url('news-detail/'.$newsDetail->id)}}" class="post-more">Leggi di più</a></div></div>
                        </div>
                      </div>

                    </div>

            @endforeach       

      </div>
    </div>
  </div>
</div>
@endsection