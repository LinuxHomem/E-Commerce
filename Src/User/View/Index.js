$('#way1').waypoint(function() {
  $(".cd1").animate({opacity: '1', bottom: 0}, "slow", function() {
    $(".cd2").animate({opacity: '1', bottom: 0}, "slow", function() {
      $(".cd3").animate({opacity: '1', bottom: 0}, "slow");
    });
  });
});

$('#way2').waypoint(function() {
  $(".cr").animate({opacity: '1', bottom: 0}, "slow");
});

$('#way3').waypoint(function() {
  $(".jb").animate({opacity: '1', bottom: 0}, "slow");
});

$(window).on('load', function () {
    $('.header').height($(window).height());
    $(".title").animate({opacity: '1', bottom: 0}, "slow");
});
