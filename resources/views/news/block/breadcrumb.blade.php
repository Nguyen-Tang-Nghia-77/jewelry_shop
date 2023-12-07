@php
     use App\Helpers\URL;
@endphp
<div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('news/images/footer.jpg') !!}" data-speed="0.8"></div>
    <div class="home_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="home_title">{!! $item['name'] !!}</div>
                        <div class="breadcrumbs">
                            <ul class="d-flex flex-row align-items-start justify-content-start">
                                <li><a href="{!! route('home')!!}">Trang chủ</a></li>
                                @if (isset($breadcrumbs))
                                    @foreach ($breadcrumbs as $id => $breadcrumb)
                                        
                                        <li><a href="{{ URL::linkCategory($id, $breadcrumb) }}">{!! $breadcrumb !!}</a></li>
                                    @endforeach
                                @else
                                    <li>{{ $item['name'] }}</li>
                                @endif
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>