$(function() {
  // #back-top TOPに戻る

  let app = new Vue({
    el: "#app-pagetop",
    data: {
      scTimer: 0,
      scY: 0
    },
    created: function() {
      //scイベント登録
      window.addEventListener("scroll", this.scEvent);
      this.getPostData();
    },
    methods: {
      //トップに戻る
      toTop: function() {
        let scrolled = window.pageYOffset;
        window.scrollTo(0, Math.floor(scrolled * 0.8));
        if (scrolled > 0) {
          window.setTimeout(this.toTop, 10);
        }
      },

      //scイベントで現在のスクロール値を取得
      scEvent: function() {
        if (this.scTimer) return;
        this.scTimer = setTimeout(() => {
          this.scY = window.scrollY;

          clearTimeout(this.scTimer);
          this.scTimer = 0;
        }, 100);
      }
    }
  });
});
