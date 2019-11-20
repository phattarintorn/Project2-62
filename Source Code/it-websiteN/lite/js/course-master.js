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

  var idBody;
  var Auth = firebase.auth();
  var dbRef = firebase.database();
  var topicRef = dbRef.ref('website')
  var i=0;

  $.LoadingOverlay("show");

  var dateAndTime = new Date();
  var dateViewPage = dateAndTime.toDateString();
  var monthViewPage = dateViewPage.split(" ")[1];
  var yearViewPage = dateViewPage.split(" ")[3];
  var n,s,countPage=0,countSum=0;
  var countView,sumView;

  var numCountCourseMaster = firebase.database().ref('statistic/course_master_page').child(yearViewPage).child(monthViewPage).child('count');
  numCountCourseMaster.on('value',snap=>{

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
      firebase.database().ref('statistic/course_master_page').child(yearViewPage).child(monthViewPage).update(countView);
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



  $('#Studyplan').hide();
  $('#branch').hide();
  $('#download').hide();
   /*------------------------  edit course (2555) -----------------------------------*/

  var rootRefCourses = topicRef.child("course/AddCourses").child('ปริญญาโท');
  rootRefCourses.on("child_added",snap => {
   var snapkey = snap.key;
   i=i+1;


    $('#Suggestion_work').append(
      "<tr id='"+snap.key+"'>"+
          "<td style='"+'width:50px;'+"'><span class='"+'round'+"'>"+ i +"</span></td>"+
          "<td>"+
              "<h5>"+ snapkey +"</h5>"+
              "</td>"+
          "<td><a href='"+'#branch'+"'><button type='"+'button'+"' class='"+'btn-edit-expert btn waves-effect waves-light btn-success'+"'><i class='"+'mdi mdi-file-document-box'+"'></i> อ่านรายระเอียดเพิ่มเติม</button></a></td>"+
          "<td><a href='"+'#download'+"'><button type='"+'button'+"' class='"+'btn-edit-expert btn waves-effect waves-light btn-danger'+"'><i class='"+'mdi mdi-download'+"'></i> ดาวน์โหลดเอกเพิ่มเติม</button></a></td>"+
      "</tr>"
        );

        if(i==1){

                var rootRefBranch = topicRef.child("course/AddCourses").child('ปริญญาโท').child(snapkey);

                $('#Studyplan').show();
                $('#branch').show();
                $('#download').show();

                $('#TitleStudyplan').text(snapkey);
                $('#TitleDownload').text(snapkey);
                $('#TitlePlan').text(snapkey);



                     var DownloadPlan = topicRef.child("course/AddStudyplan").child('ปริญญาโท').child(snapkey).child('Studyplan').child('file');
                     DownloadPlan.on('value',snap => {
                        $('#downloadPlan').attr("href",snap.val());
                      });



                $('#Branch_work').empty();

          rootRefBranch.on("child_added",snap => {
           var snapkey = snap.key;
           var img = snap.child('file').val();
           var topic = snap.child('topic').val();
           var topic2 = snap.child('topic2').val();
           var detail = snap.child('detail').val();
           var detail2 = snap.child('detail2').val();


           $('#Branch_work').append(
               "<div class='"+'col-lg-4 col-xlg-4 col-md-12 col-sm-12'+"' id='"+snap.key+"'>"+
                   "<div class='"+'card'+"'>"+
                       "<img class='"+'card-img-top'+"' src='"+ img +"' alt='"+'Card image cap'+"' width='"+'100%'+"' >"+
                       "<div class='"+'card-body little-profile text-center'+"'>"+
                         "<div class='"+'card-block'+"'>"+
                           "<h3 class='"+'m-b-0'+"'>"+ topic +"</h3>"+
                           "<p>สาขาวิชาเทคโนโลยีสารสนเทศ </p>"+
                         "</div>"+
                       "</div>"+
                   "</div>"+
                 "</div>"+

                 "<div class='"+'col-lg-8 col-xlg-8 col-md-12 col-sm-12'+"'>"+
                  "<div class='"+'card'+"'>"+
                      "<div class='"+'card-block'+"'>"+
                          "<div class='"+'card-body'+"'>"+
                              "<h4 class='"+'card-title text-center'+"'>"+ topic +"</h4>"+
                              "<h6 class='"+'card-subtitle text-center'+"'>ลักษณะวิชาที่ศึกษาและลักษณะวิชาชีพ</h6> </div>"+
                                "<div class='"+'comment-widgets'+"'>"+
                                    "<div class='"+'d-flex flex-row comment-row'+"'>"+
                                      "<div class='"+'p-1'+"'><span class='"+'round'+"'><img src='"+'../images/education-icon_348737.png'+"'  width='"+'50'+"'></span></div>"+
                                        "<div class='"+'comment-text w-100'+"'>"+
                                          "<h5>ชื่อปริญญา</h5>"+
                                          "<p class='"+'m-b-5'+"'>"+ topic2 +"</p>"+
                                          "</div>"+
                                        "</div>"+
                                      "<div class='"+'d-flex flex-row comment-row'+"'>"+
                                    "<div class='"+'p-2'+"'><span class='"+'round'+"'><img src='"+'../images/homepage-icon8.png'+"' width='"+'50'+"'></span></div>"+
                                      "<div class='"+'comment-text w-100'+"'>"+
                                        "<h5>ลักษณะวิชาที่ศึกษา</h5>"+
                                        "<p class='"+'m-b-5'+"'>"+ detail2 +"</p>"+
                                      "</div>"+
                                    "</div>"+
                                "<div class='"+'d-flex flex-row comment-row'+"'>"+
                                  "<div class='"+'p-2'+"'><span class='"+'round'+"'><img src='"+'../images/engineer.png'+"' width='"+'50'+"'></span></div>"+
                                    "<div class='"+'comment-text w-100'+"'>"+
                                      "<h5>ลักษณะวิชาชีพ</h5>"+
                                      "<p class='"+'m-b-5'+"'>"+ detail +"</p>"+
                                    "</div>"+
                                  "</div>"+

                                  "</div>"+
                                "</div>"+

                            "</div>"+
                          "</div>"

             );
              });

              var Download = topicRef.child("course/AddDownload").child('ปริญญาโท').child(snapkey);
          $('#Download_work').empty();
           Download.on("child_added",snap => {
             var snapkey = snap.key;
             var topic = snap.child('topic').val();
             var detail = snap.child('topic2').val();
             var file = snap.child('file').val();


             $('#Download_work').append(

             "<div class='"+' col-xlg-3 col-lg-3 col-md-6 col-sm-12'+"' id='"+snap.key+"'>"+
                                    "<div class='"+'card card-inverse card-success'+"'>"+
                                      "<div class='"+'card-block'+"'>"+
                                         "<div class='"+'card-body'+"'>"+
                                           "<div class='"+'d-flex'+"'>"+
                                             "<div class='"+'m-r-20 align-self-center'+"'>"+
                                                 "<h1 class='"+'text-white'+"'><i class='"+'icon-cloud-download'+"'></i></h1></div>"+
                                                 "<div>"+
                                                     "<h6 class='"+'card-title'+"'>"+ detail +"</h6>"+
                                                     "<h5 class='"+'card-subtitle'+"'>"+ topic +"</h5></div>"+
                                                 "</div>"+
                                             "<div class='"+'row'+"'>"+
                                                 "<div class='"+'col-4 align-self-center'+"'>"+
                                                 "</div>"+
                                                 "<div class='"+'col-8 p-t-10 p-b-10 text-right'+"'>"+
                                                     "<div class='"+'spark-count'+"' style='"+'height:25px'+"'><a href='"+ file +"' target='"+'_blank'+"'><button type='"+'button'+"'  class='"+'btn waves-effect waves-light btn-info'+"'>ดาวน์โหลด</button></a></div>"+

                                                     "</div>"+
                                                 "</div>"+

                                             "</div>"+
                                         "</div>"+

                                     "</div>"+
                                 "</div>"


           );

           });

        }
                                  $.LoadingOverlay("hide");

    });


    $('#Suggestion_work').on('click','.btn-edit-expert',function(){

      var key = $(this).closest('tr').attr("id");

      var rootRefBranch = topicRef.child("course/AddCourses").child('ปริญญาโท').child(key);

      $('#Studyplan').show();
      $('#branch').show();
      $('#download').show();

      $('#TitleStudyplan').text(key);
      $('#TitleDownload').text(key);
      $('#TitlePlan').text(key);



           var DownloadPlan = topicRef.child("course/AddStudyplan").child('ปริญญาโท').child(key).child('Studyplan').child('file');
           DownloadPlan.on('value',snap => {
              $('#downloadPlan').attr("href",snap.val());
            });



      $('#Branch_work').empty();

rootRefBranch.on("child_added",snap => {
 var snapkey = snap.key;
 var img = snap.child('file').val();
 var topic = snap.child('topic').val();
 var topic2 = snap.child('topic2').val();
 var detail = snap.child('detail').val();
 var detail2 = snap.child('detail2').val();


 $('#Branch_work').append(
     "<div class='"+'col-lg-4 col-xlg-4 col-md-12 col-sm-12'+"' id='"+snap.key+"'>"+
         "<div class='"+'card'+"'>"+
             "<img class='"+'card-img-top'+"' src='"+ img +"' alt='"+'Card image cap'+"' width='"+'100%'+"' >"+
             "<div class='"+'card-body little-profile text-center'+"'>"+
               "<div class='"+'card-block'+"'>"+
                 "<h3 class='"+'m-b-0'+"'>"+ topic +"</h3>"+
                 "<p>สาขาวิชาเทคโนโลยีสารสนเทศ </p>"+
               "</div>"+
             "</div>"+
         "</div>"+
       "</div>"+

       "<div class='"+'col-lg-8 col-xlg-8 col-md-12 col-sm-12'+"'>"+
        "<div class='"+'card'+"'>"+
            "<div class='"+'card-block'+"'>"+
                "<div class='"+'card-body'+"'>"+
                    "<h4 class='"+'card-title text-center'+"'>"+ topic +"</h4>"+
                    "<h6 class='"+'card-subtitle text-center'+"'>ลักษณะวิชาที่ศึกษาและลักษณะวิชาชีพ</h6> </div>"+
                      "<div class='"+'comment-widgets'+"'>"+
                          "<div class='"+'d-flex flex-row comment-row'+"'>"+
                            "<div class='"+'p-1'+"'><span class='"+'round'+"'><img src='"+'../images/education-icon_348737.png'+"'  width='"+'50'+"'></span></div>"+
                              "<div class='"+'comment-text w-100'+"'>"+
                                "<h5>ชื่อปริญญา</h5>"+
                                "<p class='"+'m-b-5'+"'>"+ topic2 +"</p>"+
                                "</div>"+
                              "</div>"+
                            "<div class='"+'d-flex flex-row comment-row'+"'>"+
                          "<div class='"+'p-2'+"'><span class='"+'round'+"'><img src='"+'../images/homepage-icon8.png'+"' width='"+'50'+"'></span></div>"+
                            "<div class='"+'comment-text w-100'+"'>"+
                              "<h5>ลักษณะวิชาที่ศึกษา</h5>"+
                              "<p class='"+'m-b-5'+"'>"+ detail2 +"</p>"+
                            "</div>"+
                          "</div>"+
                      "<div class='"+'d-flex flex-row comment-row'+"'>"+
                        "<div class='"+'p-2'+"'><span class='"+'round'+"'><img src='"+'../images/engineer.png'+"' width='"+'50'+"'></span></div>"+
                          "<div class='"+'comment-text w-100'+"'>"+
                            "<h5>ลักษณะวิชาชีพ</h5>"+
                            "<p class='"+'m-b-5'+"'>"+ detail +"</p>"+
                          "</div>"+
                        "</div>"+

                        "</div>"+
                      "</div>"+

                  "</div>"+
                "</div>"


   );



    });

    /*------------------------  edit Dowload (2555) -----------------------------------*/
    var Download = topicRef.child("course/AddDownload").child('ปริญญาโท').child(key);
$('#Download_work').empty();
 Download.on("child_added",snap => {
   var snapkey = snap.key;
   var topic = snap.child('topic').val();
   var detail = snap.child('topic2').val();
   var file = snap.child('file').val();


   $('#Download_work').append(

   "<div class='"+' col-xlg-3 col-lg-3 col-md-6 col-sm-12'+"' id='"+snap.key+"'>"+
                          "<div class='"+'card card-inverse card-success'+"'>"+
                            "<div class='"+'card-block'+"'>"+
                               "<div class='"+'card-body'+"'>"+
                                 "<div class='"+'d-flex'+"'>"+
                                   "<div class='"+'m-r-20 align-self-center'+"'>"+
                                       "<h1 class='"+'text-white'+"'><i class='"+'icon-cloud-download'+"'></i></h1></div>"+
                                       "<div>"+
                                           "<h6 class='"+'card-title'+"'>"+ detail +"</h6>"+
                                           "<h5 class='"+'card-subtitle'+"'>"+ topic +"</h5></div>"+
                                       "</div>"+
                                   "<div class='"+'row'+"'>"+
                                       "<div class='"+'col-4 align-self-center'+"'>"+
                                       "</div>"+
                                       "<div class='"+'col-8 p-t-10 p-b-10 text-right'+"'>"+
                                           "<div class='"+'spark-count'+"' style='"+'height:25px'+"'><a href='"+ file +"' target='"+'_blank'+"'><button type='"+'button'+"'  class='"+'btn waves-effect waves-light btn-info'+"'>ดาวน์โหลด</button></a></div>"+

                                           "</div>"+
                                       "</div>"+

                                   "</div>"+
                               "</div>"+

                           "</div>"+
                       "</div>"


 );

 });


    });

    $('#Branch_work').on('click','.btn btn-block',function(){


      $('#ModelStudyplan').modal('show');
    });


 $('#btClose').on('click',function(e){
      e.preventDefault();
        $('#ModelStudyplan').modal('hide');
    });

});
