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

    $.LoadingOverlay("show");

    var dateAndTime = new Date();
    var dateViewPage = dateAndTime.toDateString();
    var monthViewPage = dateViewPage.split(" ")[1];
    var yearViewPage = dateViewPage.split(" ")[3];
    var n,s,countPage=0,countSum=0;
    var countView,sumView;

    var numCountActivity = firebase.database().ref('statistic/activity_page').child(yearViewPage).child(monthViewPage).child('count');
    numCountActivity.on('value',snap=>{

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
        firebase.database().ref('statistic/activity_page').child(yearViewPage).child(monthViewPage).update(countView);
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


    var activityBecRef = firebase.database().ref("website/student/bechelor/activity");

  // ======================================================= Get Portfolio =======================================================
    activityBecRef.on("child_added",snap => {
      var key = snap.key;
      var showStatus = snap.child("activity_show_status").val();
      var dateStart = snap.child("activity_start").val();
      var dateEnd = snap.child("activity_end").val();
      var detail = snap.child("activity_detail").val();
      var name = snap.child("activity_name").val();

      if (showStatus == "checked"){
      $('#showActivityBachelor').append("<div  class='"+'col-xlg-3 col-lg-4 col-md-4 col-sm-6'+"'>"+
          "<div class='"+'card '+"'>"+
            "<div class='"+'card-block'+"'>"+
              "<div  class='"+'el-card-item'+"'>"+
                  "<div class='"+'el-card-content'+"'>"+
                      "<h3 class='"+'box-title text-center'+"'><i class='"+'mdi mdi-lightbulb-on'+"'></i><br>"+name+"</h3>"+
                      "<p class='"+'box-title text-center'+"'>"+detail+"</p><br><br>"+
                      "<h6 class='"+'text-center'+"'><i class='"+'mdi mdi-calendar-clock'+"'></i> "+dateStart+" - "+dateEnd+"</h6><br>"+
                      "</div>"+

              "</div>"+
              "<div class='"+'card-body text-center'+"' id='"+key+"'>"+
                  "<button class='"+'btn btn-info  btn-rounded image'+"'><i class='"+'mdi mdi-image-multiple'+"'></i> รูปภาพ</button>"+
                  " <button class='"+'btn btn-success  btn-rounded video'+"'><i class='"+'mdi mdi-video'+"'></i> วิดีโอ</button>"+
              "</div>"+
            "</div>"+
          "</div>"+
      "</div>");

      }
      $.LoadingOverlay("hide");
    });

    $('#showActivityBachelor').on('click','.image',function(){
      var id = $(this).closest('div').attr('id');
      sessionStorage.setItem("activityId",id);
      window.open("http://it2.sut.ac.th/prj60_g7/it-website/lite/detail-activity-bachelor.php");
    });

    $('#showActivityBachelor').on('click','.video',function(){
      $('#list_video').empty();
      var id = $(this).closest('div').attr('id');
      var i=0;
      $('#showVideoModal').modal('show');
      var videoBecRef = firebase.database().ref("website/student/bechelor/activity").child(id).child('activity_video');
      videoBecRef.on("child_added",snap => {
        var video = snap.child('videos').val();
        $('#list_video').append("<div class='"+'col-xlg-6 col-lg-6 col-sm-12 col-md-12'+"'><video style='"+'border-radius:10px'+"'width='"+'370px'+"' controls><source src='"+video+"' type='"+'video/WebM'+"'></video></div>");
        i=i+1;
      });
      if(i == 0){
        $('#list_video').append("<div class='"+'col-lg-4'+"'></div><h4 class='"+'text-center col-lg-4'+"'>"+
                                "<i class='"+'mdi mdi-video-off'+"'></i> กิจกรรมนี้ไม่มีวิดีโอ</h4><div class='"+'col-lg-4'+"'></div>");
      }

    });


    var activityGraRef = firebase.database().ref("website/student/graduate/activity");

  // ======================================================= Get Portfolio =======================================================
    activityGraRef.on("child_added",snap => {
      var key = snap.key;
      var showStatus = snap.child("activity_show_status").val();
      var dateStart = snap.child("activity_start").val();
      var dateEnd = snap.child("activity_end").val();
      var detail = snap.child("activity_detail").val();
      var name = snap.child("activity_name").val();

      if (showStatus == "checked"){
      $('#showActivityGraduation').append("<div  class='"+'col-xlg-3 col-lg-4 col-md-4 col-sm-6'+"'>"+
          "<div class='"+'card'+"'>"+
            "<div class='"+'card-block'+"'>"+
              "<div  class='"+'el-card-item'+"'>"+
                  "<div class='"+'el-card-content'+"'>"+
                      "<h3 class='"+'box-title text-center'+"'><i class='"+'mdi mdi-lightbulb-on'+"'></i><br>"+name+"</h3>"+
                      "<p class='"+'box-title text-center'+"'>"+detail+"</p><br><br>"+
                      "<h6 class='"+'text-center'+"'><i class='"+'mdi mdi-calendar-clock'+"'></i> "+dateStart+" - "+dateEnd+"</h6><br>"+
                      "</div>"+

              "</div>"+
              "<div class='"+'card-body text-center'+"' id='"+key+"'>"+
                  "<button class='"+'btn btn-info image  btn-rounded'+"'><i class='"+'mdi mdi-image-multiple'+"'></i> รูปภาพ</button>"+
                  " <button class='"+'btn btn-success video  btn-rounded'+"'><i class='"+'mdi mdi-video'+"'></i> วิดีโอ</button>"+
              "</div>"+
            "</div>"+
          "</div>"+
      "</div>");

      }

    });

    $('#showActivityGraduation').on('click','.image',function(){
      var id = $(this).closest('div').attr('id');
      sessionStorage.setItem("activityId",id);
      window.open("http://it2.sut.ac.th/prj60_g7/it-website/lite/detail-activity-graduate.php");
    });


        $('#showActivityGraduation').on('click','.video',function(){
          $('#list_video').empty();
          var id = $(this).closest('div').attr('id');
          var i=0;
          $('#showVideoModal').modal('show');
          var videoBecRef = firebase.database().ref("website/student/graduate/activity").child(id).child('activity_video');
          videoBecRef.on("child_added",snap => {
            var video = snap.child('videos').val();
            $('#list_video').append("<div class='"+'col-xlg-6 col-lg-6 col-sm-12 col-md-12'+"'><video style='"+'border-radius:10px'+"'width='"+'370px'+"' controls><source src='"+video+"' type='"+'video/WebM'+"'></video></div>");
            i=i+1;
          });
          if(i == 0){
              $('#list_video').append("<div class='"+'col-lg-4'+"'></div><h4 class='"+'text-center col-lg-4'+"'>"+
                                      "<i class='"+'mdi mdi-video-off'+"'></i> กิจกรรมนี้ไม่มีวิดีโอ</h4><div class='"+'col-lg-4'+"'></div>");
          }
        });


  });
