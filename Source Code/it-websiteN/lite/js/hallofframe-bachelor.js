$(document).ready(function(){


  var portBecRef = firebase.database().ref("website/student/bechelor/portfolio");

// ======================================================= Get Portfolio =======================================================
  portBecRef.on("child_added",snap => {
    var key = snap.key;
    var Name = snap.child("port_name").val();
    var Detail = snap.child("port_detail").val();
    var Image = snap.child("port_image").val();
    var Type = snap.child("port_type").val();
    var Status = snap.child("port_status").val();
    var Year = snap.child("port_years").val();
    var showStatus = snap.child("port_show_status").val();


    if (Status == "ผลงานดีเด่น" && showStatus == "checked"){
    $('#showHall').append("<div  class='"+'answer col-xlg-4 col-lg-4 col-md-6 col-sm-12'+"'>"+
        "<div class='"+'card card-success'+"'>"+
            "<div  class='"+'el-card-item'+"'>"+
                "<div class='"+'el-card-avatar el-overlay-1'+"' style='"+'height:250px'+"'> <img src='"+Image+"'  alt='"+'user'+"'>"+
                    "<div class='"+'el-overlay scrl-up'+"'>"+
                        "<ul id='"+key+"' class='"+'el-info'+"'>"+
                            "<li><a class='"+'btn default btn-outline image-popup-vertical-fit detail'+"' ><i class='"+'mdi mdi-comment'+"'></i></a></li>"+
                        "</ul>"+
                    "</div>"+
                "</div>"+
                "<div class='"+'el-card-content'+"'>"+
                    "<h2 class='"+'box-title text-white'+"'><i class='"+'mdi mdi-seal'+"'></i> "+Name+"</h2>"+
                    "</div>"+
            "</div>"+
        "</div>"+
    "</div>");

    }

  });
  // ======================================================= End Code =======================================================

  // ======================================================= Port Detail =======================================================
  $('#showHall').on('click','.detail',function(e){

    $('#namePort').val("");
    $('#portDetail').val("");
    $('#portType').val("");
    $('#portYear').val("");
    $('#portImage').empty();


    $('#hallofframeModal').modal("show");
    var id = $(this).closest('ul').attr("id");

    var dbName = portBecRef.child(id).child('port_name');
    dbName.on('value',snap => {

      document.getElementById("namePort").innerHTML = snap.val();

      // $('#namePort').val(snap.val());
    });

    var dbDetail = portBecRef.child(id).child('port_detail');
    dbDetail.on('value',snap => {
      document.getElementById("portDetail").innerHTML = snap.val();

      // $('#portDetail').val(snap.val());
    });

    var dbType = portBecRef.child(id).child('port_type');
    dbType.on('value',snap => {
      document.getElementById("portType").innerHTML = snap.val();

      // $('#portType').val(snap.val());
    });

    var dbYear = portBecRef.child(id).child('port_years');
    dbYear.on('value',snap => {
      document.getElementById("portYear").innerHTML = snap.val();

      // $('#portYear').val(snap.val());
    });

    var dbImage = portBecRef.child(id).child('port_image');
    dbImage.on('value',snap => {
      $('#portImage').append("<img src='"+snap.val()+"' style='"+'border-radius: 25px'+"' class='"+'col-md-12'+"' border='"+'2'+"'/>");
    });

    });
    // ======================================================= End Code =======================================================

    $("#searchHall").keyup(function(event) {
    var text = $(this).val();
    $('#showHall .answer:contains(' + text + ')').show();
    $('#showHall .answer:not(:contains(' + text + '))').hide();
  });

});
