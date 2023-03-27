require('./bootstrap');

setTimeout(function() {
  $(".flash")
      .fadeOut(5000)
      .queue(function() {
          this.remove();
      });
}, 1000);
