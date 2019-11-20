$(document).ready(function(){
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA4WVo9ZjdTKHW1ALNRwbuoqx5uxP8gsWM",
    authDomain: "itms-management-system.firebaseapp.com",
    databaseURL: "https://itms-management-system.firebaseio.com",
    projectId: "itms-management-system",
    storageBucket: "itms-management-system.appspot.com",
    messagingSenderId: "131587290108"
  };
  firebase.initializeApp(config);
    $.LoadingOverlay("show");
    var dateAndTime = new Date();
    var dateViewPage = dateAndTime.toDateString();
    var monthViewPage = dateViewPage.split(" ")[1];
    var yearViewPage = dateViewPage.split(" ")[3];
    var n,s,countPage=0,countSum=0;
    var countView,sumView;


    var numCountIndex = firebase.database().ref('statistic/index_page').child(yearViewPage).child(monthViewPage).child('count');
    numCountIndex.on('value',snap=>{

    n = snap.val();

    if(n==null){
      n=0;
    }else{
      n++;
    }

    countView = {
      count:n
    };

    countPage++;
    if(countPage==1){
      firebase.database().ref('statistic/index_page').child(yearViewPage).child(monthViewPage).update(countView);
    }

    });


    var sumAll = firebase.database().ref('statistic/sum').child(yearViewPage).child(monthViewPage).child('sum');
    sumAll.on('value',snap=>{

    s = snap.val();

    if(s==null){
      s=0;
    }else{
      s++;
    }

    sumView = {
      sum:s
    };

    countSum++;
    if(countSum==1){
    firebase.database().ref('statistic/sum').child(yearViewPage).child(monthViewPage).update(sumView);
    }

    });



  var i=0;
  var dbImgHeaderSlide = firebase.database().ref('website/index/header');
dbImgHeaderSlide.on('child_added',snap=>{

  var bg = snap.child('bg').val();
  var topic = snap.child('topic').val();
  var detail = snap.child('detail').val();
  var link = snap.child('link').val();
  var txt_bt = snap.child('txt_bt').val();

  if(i==0){
    $('#carouselCount').append("<li id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+i+"' class='"+'active'+"'></li>");
    $('#imageHeaderSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item active'+"'><div style='"+'background-image:url('+bg+'); width:100%;height:50vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h1 class='"+'text-white'+"'>"+topic+"</h1><h3 class='"+'text-white'+"'>"+detail+"</h3><a href='"+link+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>"+txt_bt+"</button></a></div></div>");
  }else{
    $('#carouselCount').append("<li id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+i+"'></li>");
    $('#imageHeaderSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item'+"'><div style='"+'background-image:url('+bg+');width:100%;height:50vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h1 class='"+'text-white'+"'>"+topic+"</h1><h3 class='"+'text-white'+"'>"+detail+"</h3><a href='"+link+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>"+txt_bt+"</button></a></div></div>");
  }
  $.LoadingOverlay("hide");
  i=i+1;
});

dbImgHeaderSlide.on('child_changed',snap=>{

  var bg = snap.child('bg').val();
  var topic = snap.child('topic').val();
  var detail = snap.child('detail').val();
  var link = snap.child('link').val();
  var txt_bt = snap.child('txt_bt').val();
  var active = $('#imageHeaderSlide').find('#'+snap.key).attr('class');
    $('#imageHeaderSlide').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      $('#imageHeaderSlide').append("<div  id='"+snap.key+"'  class='"+'carousel-item active'+"'><div style='"+'background-image:url('+bg+'); width:100%;height:50vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h1 class='"+'text-white'+"'>"+topic+"</h1><h3 class='"+'text-white'+"'>"+detail+"</h3><a href='"+link+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>"+txt_bt+"</button></a></div></div>");
    }else{
      $('#imageHeaderSlide').append("<div  id='"+snap.key+"'  class='"+'carousel-item '+"'><div style='"+'background-image:url('+bg+'); width:100%;height:50vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h1 class='"+'text-white'+"'>"+topic+"</h1><h3 class='"+'text-white'+"'>"+detail+"</h3><a href='"+link+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>"+txt_bt+"</button></a></div></div>");
    }


});

dbImgHeaderSlide.on('child_removed',snap=>{
var active = $('#imageHeaderSlide').find('#'+snap.key).attr('class');
    $('#imageHeaderSlide').find('#'+snap.key).remove();
    $('#carouselCount').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      i+1;
      $('#imageHeaderSlide').find('.carousel-item').attr('class',"carousel-item active");
    }

});

var dbImgBachelor = firebase.database().ref('website/index/courseoffered').child('imageBachelor');
dbImgBachelor.on('value',snap => {
  $('#imageBachelor').attr("src",snap.val());
});

var dbImageMaster = firebase.database().ref('website/index/courseoffered').child('imageMaster');
dbImageMaster.on('value',snap => {
  $('#imageMaster').attr("src",snap.val());
});

var dbImageDoctor = firebase.database().ref('website/index/courseoffered').child('imageDoctor');
dbImageDoctor.on('value',snap => {
  $('#imageDoctor').attr("src",snap.val());
});


var dbPhilosophyBachelor = firebase.database().ref('website/index/about').child('philosophy');
  dbPhilosophyBachelor.on('value',snap => {
    $('#philosophy').text(snap.val());
  });
var n=0;
var dbPurposeBachelor = firebase.database().ref('website/index/about/purpose');
  dbPurposeBachelor.on('child_added',snap => {
    var purpose = snap.child('purpose').val();
    n=n+1;
    $('#purpose').append(""+n+"."+purpose+"<br>");

  });
var cout=0;

var dbInfoBachelor = firebase.database().ref('website/index/info/infobachelor');

dbInfoBachelor.on('child_added',snap=>{
  var photo = snap.child('photo').val();
  var topic = snap.child('topic').val();
  var url = snap.child('url').val();

  if(cout==0){
    $('#carouselInfoBachelor').append("<li  id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+cout+"' class='"+'active'+"'></li>");
    $('#imageInfoBachelorSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item active'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h3 class='"+'text-white'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
  }else{
    $('#carouselInfoBachelor').append("<li  id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+cout+"' ></li>");
    $('#imageInfoBachelorSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h3 class='"+'text-white'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
  }
    cout=cout+1;
});

dbInfoBachelor.on('child_changed',snap=>{
  var photo = snap.child('photo').val();
  var topic = snap.child('topic').val();
  var url = snap.child('url').val();
  var active = $('#imageInfoBachelorSlide').find('#'+snap.key).attr('class');
    $('#imageInfoBachelorSlide').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      $('#imageInfoBachelorSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item active'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h3 class='"+'text-white'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
    }else{
      $('#imageInfoBachelorSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h3 class='"+'text-white'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
    }
});

dbInfoBachelor.on('child_removed',snap=>{
var active = $('#imageInfoBachelorSlide').find('#'+snap.key).attr('class');
    $('#imageInfoBachelorSlide').find('#'+snap.key).remove();
    $('#carouselInfoBachelor').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      cout+1;
      $('#imageInfoBachelorSlide').find('.carousel-item').attr('class',"carousel-item active");
    }

});

var num=0;
var dbInfoGraduate = firebase.database().ref('website/index/info/infograduate');
dbInfoGraduate.on('child_added',snap=>{
  var photo = snap.child('photo').val();
  var topic = snap.child('topic').val();
  var url = snap.child('url').val();

  if(num==0){
    $('#carouselInfoGraduate').append("<li id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+num+"' class='"+'active'+"'></li>");
    $('#imageInfoGraduationSlide').append("<div id='"+snap.key+"' class='"+'carousel-item active'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h3 class='"+'text-black'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
  }else{
    $('#carouselInfoGraduate').append("<li id='"+snap.key+"' data-target='"+'#carouselExampleIndicators'+"' data-slide-to='"+num+"' v></li>");
    $('#imageInfoGraduationSlide').append("<div id='"+snap.key+"' class='"+'carousel-item'+"'><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                              "<h3 class='"+'text-black'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
  }
  num=num+1;

});

dbInfoGraduate.on('child_changed',snap=>{
  var photo = snap.child('photo').val();
  var topic = snap.child('topic').val();
  var url = snap.child('url').val();
  var active = $('#imageInfoGraduationSlide').find('#'+snap.key).attr('class');
    $('#imageInfoGraduationSlide').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      $('#imageInfoGraduationSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item active'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h3 class='"+'text-black'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
    }else{
      $('#imageInfoGraduationSlide').append("<div  id='"+snap.key+"' class='"+'carousel-item'+"' ><div style='"+'background-image:url('+photo+'); width:100%;height:40vh;background-position:center;background-size:cover;'+"'></div><div class='"+'carousel-caption'+"'>"+
                                "<h3 class='"+'text-black'+"'>"+topic+"</h3><a href='"+url+"'><button type='"+'button'+"' class='"+'btn btn-success '+"'>รายละเอียด</button></a></div></div>");
    }
});

dbInfoGraduate.on('child_removed',snap=>{
var active = $('#imageInfoGraduationSlide').find('#'+snap.key).attr('class');
    $('#imageInfoGraduationSlide').find('#'+snap.key).remove();
    $('#carouselInfoGraduate').find('#'+snap.key).remove();
    if(active=="carousel-item active"){
      cout+1;
      $('#imageInfoGraduationSlide').find('.carousel-item').attr('class',"carousel-item active");
    }

});




});
