$(document).ready(function(){


var config = {
  apiKey: "AIzaSyA4WVo9ZjdTKHW1ALNRwbuoqx5uxP8gsWM",
  authDomain: "itms-management-system.firebaseapp.com",
  databaseURL: "https://itms-management-system.firebaseio.com",
  projectId: "itms-management-system",
  storageBucket: "itms-management-system.appspot.com",
  messagingSenderId: "131587290108"
};

  firebase.initializeApp(config);



  var imageBecRef = firebase.database().ref("website/student/bechelor/activity").child(sessionStorage.getItem("activityId")).child('activity_image');

// ======================================================= Get Portfolio =======================================================
var count=0;
  imageBecRef.on("child_added",snap => {
    count=count+1;
    var image = snap.child('images').val();
    $('#thumbnails').append("<article tabindex='"+'-1'+"'><a class='"+'thumbnail'+"' href='"+image+"' data-position='"+'left center'+"'><img src='"+image+"' alt='"+''+"' /></a></article>");

    if(count == 1){
      $('#viewer').empty();
    $('#viewer').append("<div class='"+'slide active'+"'><div class='"+'image'+"' style='"+' background-image: url('+image+');'+"'></div>");
  }

  });

  // if(count == 0){
  //   $('#viewer').empty();
  //   $('#thumbnails').append("<div class='"+'col-lg-4'+"'></div><h4 class='"+'text-center col-lg-4'+"'>"+
  //                           " กิจกรรมนี้ไม่มีรูปภาพ</h4><div class='"+'col-lg-4'+"'></div>");
  // }



    $('#thumbnails').on('click','.thumbnail',function(){
        $('.thumbnail').closest('article').removeAttr('class');
      $(this).closest('article').attr('class',"active");
      var image = $(this).attr('href');
      $('#viewer').empty();
      $('#viewer').append("<div class='"+'slide active'+"'><div class='"+'image'+"' style='"+' background-image: url('+image+');'+"'></div>");
    })

  var nameBecRef = firebase.database().ref("website/student/bechelor/activity").child(sessionStorage.getItem("activityId")).child('activity_name');
  nameBecRef.on('value',snap=>{
    $('#nameActivity').text(snap.val());
  });

  var detailBecRef = firebase.database().ref("website/student/bechelor/activity").child(sessionStorage.getItem("activityId")).child('activity_detail');
  detailBecRef.on('value',snap=>{
    $('#detailActivity').text(snap.val());
  });
  var dateStart;
  var dateStartBecRef = firebase.database().ref("website/student/bechelor/activity").child(sessionStorage.getItem("activityId")).child('activity_start');
  dateStartBecRef.on('value',snap=>{
    dateStart = snap.val();
  });

  var dateEndBecRef = firebase.database().ref("website/student/bechelor/activity").child(sessionStorage.getItem("activityId")).child('activity_end');
  dateEndBecRef.on('value',snap=>{
    $('#dateActivity').text(dateStart+ " - "+snap.val());
  });





});
