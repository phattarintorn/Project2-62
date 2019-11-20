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
  var usersRef = firebase.database().ref('users');
  var latitude,longitude;

  var countAdd = 0;
  var countDelete=0;
  var rootRefUser = usersRef;


  $.LoadingOverlay("show");

  var dateAndTime = new Date();
  var dateViewPage = dateAndTime.toDateString();
  var monthViewPage = dateViewPage.split(" ")[1];
  var yearViewPage = dateViewPage.split(" ")[3];
  var n,s,countPage=0,countSum=0;
  var countView,sumView;

  var numCountPersonal = firebase.database().ref('statistic/personal_page').child(yearViewPage).child(monthViewPage).child('count');
  numCountPersonal.on('value',snap=>{
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
      firebase.database().ref('statistic/personal_page').child(yearViewPage).child(monthViewPage).update(countView);
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



  function downloadInnerHtml(filename, elId) {
    debugger;
    var elHtml = document.getElementById(elId).innerHTML;
    var link = document.createElement('a');
    link.setAttribute('download', filename);
    link.setAttribute('href', 'data:' + 'text/doc' + ';charset=utf-8,' + encodeURIComponent(elHtml));
    link.click();
}

$('#printHisEducation').click(function () {
var fileName =  'ประวัติการศึกษา.doc'; // You can use the .txt extension if you want
downloadInnerHtml(fileName, 'historyEducation');
});

$('#printHisWork').click(function(){
  var fileName =  'ประวัติการทำงาน.doc'; // You can use the .txt extension if you want
  downloadInnerHtml(fileName, 'historyWork');
});

$('#printHisAcademicWork').click(function(){
  var fileName =  'ผลงานวิชาการ.doc'; // You can use the .txt extension if you want
  downloadInnerHtml(fileName, 'academicWork');
});

$('#printAll').click(function(){
  var fileName =  'ประวัติและผลงาน.doc'; // You can use the .txt extension if you want
  downloadInnerHtml(fileName, 'all');
});

rootRefUser.orderByChild('position').equalTo("อาจารย์ (อ.)").on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var position = snap.child("position").val();
  var age = snap.child("age").val();
  var leader = snap.child("leader").val();
  var status;

  var splitPositionFirst = position.split("(")[1];
  var splitPositionLasted = splitPositionFirst.split(")")[0];

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "คณาจารย์และบุคลากร"){
    if(leader!="หัวหน้าสาขา"){
      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
      $.LoadingOverlay("hide");
   }
  }

});

rootRefUser.orderByChild('position').equalTo("อาจารย์ ดอกเตอร์ (อ. ดร.)").on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var position = snap.child("position").val();
  var age = snap.child("age").val();
  var leader = snap.child("leader").val();
  var status;

  var splitPositionFirst = position.split("(")[1];
  var splitPositionLasted = splitPositionFirst.split(")")[0];

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "คณาจารย์และบุคลากร"){
    if(leader!="หัวหน้าสาขา"){
      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
      $.LoadingOverlay("hide");
   }
  }
});

rootRefUser.orderByChild('position').equalTo("ผู้ช่วยศาสตราจารย์ ดอกเตอร์ (ผศ. ดร.)").on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var position = snap.child("position").val();
  var age = snap.child("age").val();
  var leader = snap.child("leader").val();
  var status;

  var splitPositionFirst = position.split("(")[1];
  var splitPositionLasted = splitPositionFirst.split(")")[0];

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "คณาจารย์และบุคลากร"){
    if(leader!="หัวหน้าสาขา"){
      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
      $.LoadingOverlay("hide");
   }
  }
});

rootRefUser.orderByChild('position').equalTo("รองศาสตราจารย์ ดอกเตอร์ (รศ. ดร.)").on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var position = snap.child("position").val();
  var age = snap.child("age").val();
  var leader = snap.child("leader").val();
  var status;

  var splitPositionFirst = position.split("(")[1];
  var splitPositionLasted = splitPositionFirst.split(")")[0];

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "คณาจารย์และบุคลากร"){
    if(leader!="หัวหน้าสาขา"){
      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
      $.LoadingOverlay("hide");
   }
  }
});



usersRef.on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var position = snap.child("position").val();
  var age = snap.child("age").val();
  var leader = snap.child("leader").val();
  var status;

  var splitPositionFirst = position.split("(")[1];
  var splitPositionLasted = splitPositionFirst.split(")")[0];

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "คณาจารย์และบุคลากร"){
    if(leader=="หัวหน้าสาขา"){

      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<h5><i class='"+'ti-crown'+"'></i> หัวหน้าสาขา</h5><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");

    }
  }
});

rootRefUser.on("child_changed",snap => {

    var image = snap.child("image").val();
    var name = snap.child("name").val();
    var telephone = snap.child("telephone").val();
    var email = snap.child("email").val();
    var office = snap.child("office").val();
    var level = snap.child("level").val();
    var position = snap.child("position").val();
    var age = snap.child("age").val();
    var leader = snap.child("leader").val();
    var status;

    $('#list_teacher').find('#'+snap.key).remove();

    if(office == "border:8px solid #66ff66;"){
    status="สามารถเข้าพบได้";
  }else if(office == "border:8px solid #ff6666;"){
      status="ไม่อยู่";
    }else if(office == "border:8px solid #ffdb4d;"){
      status="กรุณารอสักครู่";
    }else if(office == "border:8px solid #ffa366;"){
      status="ห้ามรบกวน";
    }else{
      status="ยังไม่มีสถานะ";
    }

    if(level == "คณาจารย์และบุคลากร"){
      if(leader=="หัวหน้าสาขา"){
        $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                  "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                  "<h5><i class='"+'ti-crown'+"'></i> หัวหน้าสาขา</h5><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                  "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                  "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                  "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                  " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                  " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                  " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                  "</span></div>"+
                                  "<br><br><div class='"+'card-footer'+"'><h4><span>"+splitPositionLasted+name+"</span></h4>"+
                                  "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                  "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");

      }else{
      $('#list_teacher').prepend("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><img class='"+'card-img-top'+"' src='"+'../assets/images/background/profile-bg.jpg'+"'>"+
                                "<div class='"+'card-body little-profile'+"'><div class='"+'pro-img'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6>"+
                                "<div class='"+'showToolTip'+"'><button type='"+'button'+"'class='"+'btn btn-rounded btn-info'+"'>ข้อมูลเพิ่มเติม</button>"+
                                "<span id='"+snap.key+"'class='"+'tooltipButton'+"'>"+
                                "<button type='"+'button'+"'class='"+'btn btn-circle btn-secondary googleMap'+"'><i class='"+'fa fa-map-marker'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary subject'+"'><i class='"+'fa fa-pencil'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary graduationCap'+"'><i class='"+'fa fa-user'+"'></i></button>"+
                                " <button type='"+'button'+"'class='"+'btn btn-circle btn-secondary officeHour'+"'><i class='"+'fa fa-calendar'+"'></i></button>"+
                                "</span></div>"+
                                "<br><br><div class='"+'card-footer'+"'><h4><span>"+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
        }
    }

});


rootRefUser.on("child_removed",snap => {

    var level = snap.child("level").val();

    if(level == "คณาจารย์และบุคลากร"){
      $('#list_teacher').find('#'+snap.key).remove();
    }

});

$('#list_teacher').on('click','.subject',function(){
  var id = $(this).closest('span').attr('id');
  $('#list_subject').empty();
  var rootRefSubject = usersRef.child(id).child('subject');
  rootRefSubject.on("child_added",snap => {
    var semester = snap.child("semester").val();
    var subject = snap.child("subject").val();
    var code = snap.child("code").val();
    var credit = snap.child("credit").val();

      $('#list_subject').append("<tr><td>"+semester+"</td><td>"+code+"</td><td>"+subject+"</td><td>"+credit+"</td></tr>");

  });
  $('#subjectModal').modal('show');
});

$('#list_teacher').on('click','.graduationCap',function(){
  var id = $(this).closest('span').attr('id');
  $('#workTeacher').show();
  $('#workPerson').hide();
  $('#hisEdu').empty();
  $('#expert').empty();
  $('#hisWork').empty();
  $('#exp').empty();
  $('#working').empty();
  $('#inter_work').empty();
  $('#nation_work').empty();
  $('#inter_conference').empty();
  $('#nation_conference').empty();
  $('#inter_journal_in_database').empty();
  $('#inter_journal_not_database').empty();
  $('#nation_journal').empty();

  var rootRefEducation = usersRef.child(id).child('education').child('his_education');
  rootRefEducation.on("child_added",snap => {
    var degree = snap.child("degree").val();
    var faculty = snap.child("faculty").val();
    var status = snap.child("status").val();
    var university = snap.child("university").val();
    var year = snap.child("year").val();

    if(status == "checked"){
      $('#hisEdu').append("<li>"+degree+" , "+faculty+" , "+university+" , "+year+"</li>");
    }

  });

  var rootRefExpert = usersRef.child(id).child('education').child('expertise');
  rootRefExpert.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var status = snap.child("status").val();
  if(status == "checked"){
    $('#expert').append("<li>"+detail+"</li>");
  }
  });

  var rootRefWork = usersRef.child(id).child('work').child('his_work');
  rootRefWork.on("child_added",snap => {
    var address = snap.child("address").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var work = snap.child("work").val();
    var status = snap.child("status").val();
      if(status == "checked"){
    $('#hisWork').append("<li>"+start_time+" - "+finish_time+" , "+work+" , "+address+"</li>");
  }
  });

  var rootRefExp = usersRef.child(id).child('work').child('experience');
  rootRefExp.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var exp = snap.child("exp").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var status = snap.child("status").val();
    if(status == "checked"){
    $('#exp').append("<li>"+exp+" , "+detail+" , "+start_time+" - "+finish_time+"</li>");
  }
  });

  var rootRefAcademicWork = usersRef.child(id).child('academic_work').child('portfolio');
  rootRefAcademicWork.on("child_added",snap => {
    var name_award = snap.child("name_award").val();
    var name_work = snap.child("name_work").val();
    var detail = snap.child("detail").val();
    var department = snap.child("department").val();
    var date = snap.child("date").val();
    var code_research = snap.child("code_research").val();
    var country = snap.child("country").val();
    var date_finish = snap.child("date_finish").val();
    var date_start = snap.child("date_start").val();
    var location = snap.child("location").val();
    var name = snap.child("name").val();
    var name_eng = snap.child("name_eng").val();
    var name_thai = snap.child("name_thai").val();
    var type_article = snap.child("type_article").val();
    var year = snap.child("year").val();
    var article = snap.child("article").val();
    var no = snap.child("no").val();
    var status_author = snap.child("status_author").val();
    var type_journal = snap.child("type_journal").val();
    var status = snap.child("status").val();
    var type = snap.child("type").val();

    if(status == "checked"){
      if(type == "inter_work"){
        $('#inter_work').append("<li>"+name_award+" , "+name_work+" , "+detail+" , "+department+" , "+date+"</li>");
      }else if(type == "nation_work"){
        $('#nation_work').append("<li>"+name_award+" , "+name_work+" , "+detail+" , "+department+" , "+date+"</li>");
      }else if(type == "nation_journal"){
        $('#nation_journal').append("<li>"+article+" , "+status_author+" , "+code_research+" , "+name+" , "+type_journal+", "+year+", "+no+"</li>");
      }else if(type == "inter_journal_not_database"){
        $('#inter_journal_not_database').append("<li>"+article+" , "+status_author+" , "+code_research+" , "+name+" , "+type_journal+", "+year+", "+no+"</li>");
      }else if(type == "inter_journal_in_database"){
        $('#inter_journal_in_database').append("<li>"+article+" , "+status_author+" , "+code_research+" , "+name+" , "+type_journal+", "+year+", "+no+"</li>");
      }else if(type == "nation_conference"){
        $('#nation_conference').append("<li>"+type_article+" , "+name_thai+" , "+name_eng+" , "+year+" , "+code_research+" , "+name+" , "+date_start+" - "+date_finish+", "+location+", "+country+"</li>");
      }else if(type == "inter_conference"){
        $('#inter_conference').append("<li>"+type_article+" , "+name_thai+" , "+name_eng+" , "+year+" , "+code_research+" , "+name+" , "+date_start+" - "+date_finish+", "+location+", "+country+"</li>");
      }

  }
  });


  $('#hisandworkModal').modal('show');
});

$('#list_teacher').on('click','.googleMap',function(){

  var id = $(this).closest('span').attr('id');

  var dblatitude = firebase.database().ref('users').child(id).child('latitude');
  dblatitude.on('value',snap =>{
    latitude=snap.val();
  });
  var dblongitude = firebase.database().ref('users').child(id).child('longitude');
  dblongitude.on('value',snap =>{
    longitude=snap.val();
  });
  var dbTimeUpdate = firebase.database().ref('users').child(id).child('show_map_time');
  dbTimeUpdate.on('value',snap =>{
    if(snap.val() == null){
      $('#mapTimeUpdateNotShow').text("อัพเดตล่าสุด : ยังไม่มีการเก็บค่าตำแหน่งปัจจุบัน");
      $('#mapTimeUpdateShow').text("อัพเดตล่าสุด : ยังไม่มีการเก็บค่าตำแหน่งปัจจุบัน");
    }else{
      $('#mapTimeUpdateNotShow').text("อัพเดตล่าสุด : "+snap.val());
      $('#mapTimeUpdateShow').text("อัพเดตล่าสุด : "+snap.val());
    }

  });

if(latitude !="" && longitude != ""){
  $('#mapModal').modal('show');
  showPosition();
}else{
  $('#notShowModal').modal('show');
}

});

function showPosition(){
  var lat = parseFloat(latitude);
  var long = parseFloat(longitude);
   var geocoder = new google.maps.Geocoder();
   var latLng = new google.maps.LatLng(lat,long);

   var initMap = function() {
       var map = new google.maps.Map(document.getElementById('map'), {
           center: { lat: lat, lng: long},
           scrollwheel: false,
           zoom: 20
       });
       var geocoder = new google.maps.Geocoder;
       var infowindow = new google.maps.InfoWindow;
       geocodeLatLng(geocoder, map, infowindow);

   }

   var geocodeLatLng = function(geocoder, map, infowindow) {
     var input = ""+lat+","+long+"";
     var latlngStr = input.split(',', 2);
     var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
     geocoder.geocode({'location': latlng}, function(results, status) {
       if (status === 'OK') {
         if (results[0]) {
           map.setZoom(17);
           var marker = new google.maps.Marker({
             position: latlng,
             map: map
           });
           infowindow.setContent(results[0].formatted_address);
           infowindow.open(map, marker);
         } else {
           window.alert('No results found');
         }
       } else {
         window.alert('Geocoder failed due to: ' + status);
       }
     });
   }
   initMap();
} //showPositi

$('#list_teacher').on('click','.officeHour',function(){
  var id = $(this).closest('span').attr('id');
    $('#list_day').empty();
  $('#officeHourModal').modal('show');
  var dbDay = firebase.database().ref('users').child(id).child('office_hour');
dbDay.on('child_added',snap =>{
  var day = snap.child('day').val();

  var h1 = snap.child('hour_1').val();
  var h2 = snap.child('hour_2').val();
  var h3 = snap.child('hour_3').val();
  var h4 = snap.child('hour_4').val();
  var h5 = snap.child('hour_5').val();
  var h6 = snap.child('hour_6').val();
  var h7 = snap.child('hour_7').val();
  var h8 = snap.child('hour_8').val();

  $('#list_day').append("<tr id='"+snap.key+"'><td >"+day+"</td><td width='"+'120px'+"' id='"+'h1'+"' bgcolor='"+h1+"'></td><td id='"+'h2'+"' width='"+'120px'+"' bgcolor='"+h2+"'></td><td id='"+'h3'+"' width='"+'120px'+"' bgcolor='"+h3+"'>"+
                                           "</td><td id='"+'h4'+"' width='"+'120px'+"' bgcolor='"+h4+"' ></td>"+
                                           "<td id='"+'h5'+"' width='"+'120px'+"' bgcolor='"+h5+"'></td><td id='"+'h6'+"' width='"+'120px'+"' bgcolor='"+h6+"'></td><td id='"+'h7'+"' width='"+'120px'+"' bgcolor='"+h7+"'></td>"+
                                           "<td id='"+'h8'+"' width='"+'120px'+"' bgcolor='"+h8+"'></td></tr>");
});
})

rootRefUser.on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var status;

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }


  if(level == "เจ้าหน้าที่บริหารงานทั่วไป"){

  $('#list_admin').append("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><div class='"+'card-block'+"'><div class='"+'hovereffect-staff'+"' id='"+'hoverProfile'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'><div class='"+'overlay'+"' id='"+snap.key+"'>"+
                            "<a class='"+'info'+"' id='"+'changePictureProfile'+"' href='"+'javascript:void(0)'+"'><i class='"+'fa fa-user'+"'></i> ประวัติและผลงาน</a></div></div>"+
                            "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6></div><div class='"+'card-footer'+"'><h4><span>"+name+"</span></h4>"+
                            "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                            "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
        console.log("add admin in child_added");
  }
    $('#listAdmin').hide();
});

rootRefUser.on("child_changed",snap => {

    var image = snap.child("image").val();
    var name = snap.child("name").val();
    var telephone = snap.child("telephone").val();
    var email = snap.child("email").val();
    var office = snap.child("office").val();
    var level = snap.child("level").val();
    var status;

    $('#list_admin').find('#'+snap.key).remove();

    if(office == "border:8px solid #66ff66;"){
    status="สามารถเข้าพบได้";
  }else if(office == "border:8px solid #ff6666;"){
      status="ไม่อยู่";
    }else if(office == "border:8px solid #ffdb4d;"){
      status="กรุณารอสักครู่";
    }else if(office == "border:8px solid #ffa366;"){
      status="ห้ามรบกวน";
    }else{
      status="ยังไม่มีสถานะ";
    }


    if(level == "เจ้าหน้าที่บริหารงานทั่วไป"){

      $('#list_admin').append("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><div class='"+'card-block'+"'><div class='"+'hovereffect-staff'+"' id='"+'hoverProfile'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'><div class='"+'overlay'+"' id='"+snap.key+"'>"+
                                "<a class='"+'info'+"' id='"+'changePictureProfile'+"' href='"+'javascript:void(0)'+"'><i class='"+'fa fa-user'+"'></i> ประวัติและผลงาน</a></div></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6></div><div class='"+'card-footer'+"'><h4><span>"+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
            console.log("changed admin");
      }

});


rootRefUser.on("child_removed",snap => {

    var level = snap.child("level").val();


    if(level == "เจ้าหน้าที่บริหารงานทั่วไป"){
      $('#list_admin').find('#'+snap.key).remove();
    }

});

$('#list_admin').on('click','.info',function(){
  var id = $(this).closest('div').attr('id');
  $('#workTeacher').hide();
  $('#workPerson').show();
  $('#hisEdu').empty();
  $('#expert').empty();
  $('#hisWork').empty();
  $('#exp').empty();
  $('#person_work').empty();


  var rootRefEducation = usersRef.child(id).child('education').child('his_education');
  rootRefEducation.on("child_added",snap => {
    var degree = snap.child("degree").val();
    var faculty = snap.child("faculty").val();
    var status = snap.child("status").val();
    var university = snap.child("university").val();
    var year = snap.child("year").val();

    if(status == "checked"){
    $('#hisEdu').append("<li>"+degree+" , "+faculty+" , "+university+" , "+year+"</li>");
  }

  });

  var rootRefExpert = usersRef.child(id).child('education').child('expertise');
  rootRefExpert.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var status = snap.child("status").val();
      if(status == "checked"){
    $('#expert').append("<li>"+detail+"</li>");
  }
  });

  var rootRefWork = usersRef.child(id).child('work').child('his_work');
  rootRefWork.on("child_added",snap => {
    var address = snap.child("address").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var work = snap.child("work").val();
    var status = snap.child("status").val();
  if(status == "checked"){
    $('#hisWork').append("<li>"+start_time+" - "+finish_time+" , "+work+" , "+address+"</li>");
  }
  });

  var rootRefExp = usersRef.child(id).child('work').child('experience');
  rootRefExp.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var exp = snap.child("exp").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var status = snap.child("status").val();
  if(status == "checked"){
    $('#exp').append("<li>"+exp+" , "+detail+" , "+start_time+" - "+finish_time+"</li>");
  }
  });

    var rootRefAcademicWork = usersRef.child(id).child('academic_work').child('portfolio');
    rootRefAcademicWork.on("child_added",snap => {
      var name_award = snap.child("name_award").val();
      var name_work = snap.child("name_work").val();
      var detail = snap.child("detail").val();
      var department = snap.child("department").val();
      var date = snap.child("date").val();
      var status = snap.child("status").val();
      if(status == "checked"){
        $('#person_work').append("<li>"+name_award+" , "+name_work+" , "+detail+" , "+department+" , "+date+"</li>");
    }
    });


  $('#hisandworkModal').modal('show');
});

rootRefUser.on("child_added",snap => {
  var image = snap.child("image").val();
  var name = snap.child("name").val();
  var telephone = snap.child("telephone").val();
  var email = snap.child("email").val();
  var office = snap.child("office").val();
  var level = snap.child("level").val();
  var status;

  if(office == "border:8px solid #66ff66;"){
  status="สามารถเข้าพบได้";
}else if(office == "border:8px solid #ff6666;"){
    status="ไม่อยู่";
  }else if(office == "border:8px solid #ffdb4d;"){
    status="กรุณารอสักครู่";
  }else if(office == "border:8px solid #ffa366;"){
    status="ห้ามรบกวน";
  }else{
    status="ยังไม่มีสถานะ";
  }

  if(level == "ผู้ช่วยสอนและวิจัย"){
  $('#list_ta').append("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><div class='"+'card-block'+"'><div class='"+'hovereffect-staff'+"' id='"+'hoverProfile'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'><div class='"+'overlay'+"' id='"+snap.key+"'>"+
                            "<a class='"+'info'+"' id='"+'changePictureProfile'+"' href='"+'javascript:void(0)'+"'><i class='"+'fa fa-user'+"'></i> ประวัติและผลงาน</a></div></div>"+
                            "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6></div><div class='"+'card-footer'+"'><h4><span>"+name+"</span></h4>"+
                            "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                            "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
    console.log("add ta in child_added");

  }

});

rootRefUser.on("child_changed",snap => {

    var image = snap.child("image").val();
    var name = snap.child("name").val();
    var telephone = snap.child("telephone").val();
    var email = snap.child("email").val();
    var office = snap.child("office").val();
    var level = snap.child("level").val();
    var status;

    $('#list_ta').find('#'+snap.key).remove();

    if(office == "border:8px solid #66ff66;"){
    status="สามารถเข้าพบได้";
  }else if(office == "border:8px solid #ff6666;"){
      status="ไม่อยู่";
    }else if(office == "border:8px solid #ffdb4d;"){
      status="กรุณารอสักครู่";
    }else if(office == "border:8px solid #ffa366;"){
      status="ห้ามรบกวน";
    }else{
      status="ยังไม่มีสถานะ";
    }

    if(level == "ผู้ช่วยสอนและวิจัย"){

      $('#list_ta').append("<div id='"+snap.key+"' class='"+'col-lg-4 text-center'+"'><div class='"+'card'+"'><div class='"+'card-block'+"'><div class='"+'hovereffect-staff'+"' id='"+'hoverProfile'+"'><img src='"+image+"' class='"+'avatar'+"' style='"+office+"'><div class='"+'overlay'+"' id='"+snap.key+"'>"+
                                "<a class='"+'info'+"' id='"+'changePictureProfile'+"' href='"+'javascript:void(0)'+"'><i class='"+'fa fa-user'+"'></i> ประวัติและผลงาน</a></div></div>"+
                                "<br><h6><span class='"+'text-muted'+"'> - "+status+" - </span></h6></div><div class='"+'card-footer'+"'><h4><span>"+name+"</span></h4>"+
                                "<p><i class='"+'fa fa-envelope-o'+"' aria-hidden='"+'true'+"'></i> "+email+"<br>"+
                                "<i class='"+'fa fa-phone'+"' aria-hidden='"+'true'+"'></i> "+telephone+"</p></div></div></div></div>");
        console.log("changed ta");

      }
});


rootRefUser.on("child_removed",snap => {

  var level = snap.child("level").val();

  if(level == "ผู้ช่วยสอนและวิจัย"){
  $('#list_ta').find('#'+snap.key).remove();
  }

});

$('#list_ta').on('click','.info',function(){
  var id = $(this).closest('div').attr('id');
  $('#workTeacher').hide();
  $('#workPerson').show();
  $('#hisEdu').empty();
  $('#expert').empty();
  $('#hisWork').empty();
  $('#exp').empty();
  $('#person_work').empty();


  var rootRefEducation = usersRef.child(id).child('education').child('his_education');
  rootRefEducation.on("child_added",snap => {
    var degree = snap.child("degree").val();
    var faculty = snap.child("faculty").val();
    var university = snap.child("university").val();
    var year = snap.child("year").val();
    var status = snap.child("status").val();
    if(status == "checked"){
    $('#hisEdu').append("<li>"+degree+" , "+faculty+" , "+university+" , "+year+"</li>");
  }
  });

  var rootRefExpert = usersRef.child(id).child('education').child('expertise');
  rootRefExpert.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var status = snap.child("status").val();
    if(status == "checked"){
    $('#expert').append("<li>"+detail+"</li>");
  }
  });

  var rootRefWork = usersRef.child(id).child('work').child('his_work');
  rootRefWork.on("child_added",snap => {
    var address = snap.child("address").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var work = snap.child("work").val();
    var status = snap.child("status").val();

    if(status == "checked"){
    $('#hisWork').append("<li>"+start_time+" - "+finish_time+" , "+work+" , "+address+"</li>");
  }
  });

  var rootRefExp = usersRef.child(id).child('work').child('experience');
  rootRefExp.on("child_added",snap => {
    var detail = snap.child("detail").val();
    var exp = snap.child("exp").val();
    var finish_time = snap.child("finish_time").val();
    var start_time = snap.child("start_time").val();
    var status = snap.child("status").val();
    if(status == "checked"){
    $('#exp').append("<li>"+exp+" , "+detail+" , "+start_time+" - "+finish_time+"</li>");
  }
  });


  var rootRefAcademicWork = usersRef.child(id).child('academic_work').child('portfolio');
  rootRefAcademicWork.on("child_added",snap => {
    var name_award = snap.child("name_award").val();
    var name_work = snap.child("name_work").val();
    var detail = snap.child("detail").val();
    var department = snap.child("department").val();
    var date = snap.child("date").val();
    var status = snap.child("status").val();
    if(status == "checked"){
      $('#person_work').append("<li>"+name_award+" , "+name_work+" , "+detail+" , "+department+" , "+date+"</li>");
  }
  });


  $('#hisandworkModal').modal('show');
});

});
