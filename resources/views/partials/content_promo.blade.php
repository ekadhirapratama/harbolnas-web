@if (isset($promos) && count($promos) > 0)
  <h1 id="content_promo" class="m-b-md">Peserta Harbolnas</h1>
  <div id="content-box" class="row m-b-md m-h--8">
    @include('partials.promo')
  </div>

  @include('partials.loading')

  @if ($type_id == 3)
    {{-- <a target="_blank" href="#"> --}}
      <img src="/images/assets/Banner_Tambahan_Mandiri_-_Web_HARBOLNAS.jpg" width="100%" class="m-b-md m-t"/>
    {{-- </a> --}}

    @include('partials.mandiri_word')
  @else
    <a target="_blank" href="https://www.shopback.co.id/harbolnas">
      <img src="/images/Resources/bottom-banner.jpg" width="100%" class="m-b-md m-t"/>
    </a>
  @endif

  <script>
  var page = 1;
  var pageLimit = 12;
  var pageCount = {{count($promos)}};
  var isLoading = false;
  var isLast = false;
  var loaderPage = document.getElementById('loader-page');
  var heightContent = $('#content-box').offset().top;
  var heightBox = $('#content-box').height()-100;

  $( document ).ready(function() {
    $(window).scroll(function(){
      if ($(this).scrollTop() >= heightContent) {
        console.log($(this).scrollTop() +" "+ heightContent);
        heightContent = heightContent + heightBox;
        readmore();
      }
    });
  });

  if (pageCount < pageLimit) {
    isLast = true;
    loaderPage.style.display = "none";
  }

  function readmore(){
    if (isLoading || isLast) {
      return;
    }
    isLoading = true;
    $.ajax({
      url: '/promo/'+{{$type_id}}+'/'+{{$category}}+'/'+page+'/'+{{$limit}},
      type: 'GET',
      data: {
        page:page,
      },
      success: function(res) {
        //append data
        $('#content-box').append(res.data);
        isLast = res.is_last;
        if (isLast) {
          loaderPage.style.display = "none";
          isLoading = false
        }
        else {
          page = page+1;
          isLoading = false;
        }
      },
      error: function(request,error) {
        isLoading = false;
      }
    });
  }
  </script>

@endif
