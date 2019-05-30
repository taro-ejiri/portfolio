//中央寄せ両サイド表示（レスポンシブ）
$(function() {
  $('.center-item').slick({
    infinite: true,
    dots:true,
    slidesToShow: 1,
    centerMode: true, //要素を中央寄せ
    centerPadding:'100px', //両サイドの見えている部分のサイズ
    autoplay:true, //自動再生
      responsive: [{
        breakpoint: 480,
        settings: {
        centerMode: false,
      }
      }]
  });
});