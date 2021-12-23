		window.addEventListener("load", function () {
          var canvas = document.getElementById("canvas");
		  // �K�v�ȕϐ���錾���Ă���
		  var c = canvas.getContext("2d");
		  var w = 320;
		  var h = 350;
		  var drawing = false;
		  var oldPos;

		  // Canvas��Context������������
		  canvas.width = w;
		  canvas.height = h;
		  c.strokeStyle = "#000000";
		  c.lineWidth = 5;
		  c.lineJoin = "round";
		  c.lineCap = "round";

		  // �^�b�v�J�n���ɁA�G��`������������
		  canvas.addEventListener("touchstart", function (event) {
		    drawing = true;
		    oldPos = getPosT(event);
		  }, false);

		  // �^�b�v�I�����ɁA�G��`���㏈�����s��
		  canvas.addEventListener("touchend", function () {
		    drawing = false;
		  }, false);

		  // gesture�C�x���g�i�Q�{�w�ȏ�ŐG��Ɣ��������j��
		  // �I�����ɂ��G��`���㏈�����s��
		  canvas.addEventListener("gestureend", function () {
		    console.log("mouseout");
		    drawing = false;
		  }, false);

		  // ���ۂɊG��`������
		  // �O��ɕۑ������ʒu���猻�݂̈ʒu����������
		  canvas.addEventListener("touchmove", function (event) {
		    var pos = getPosT(event);
		    if (drawing) {
		      c.beginPath();
		      c.moveTo(oldPos.x, oldPos.y);
		      c.lineTo(pos.x, pos.y);
		      c.stroke();
		      c.closePath();
		      oldPos = pos;
		    }
		  }, false);

		  // �^�b�v�ʒu���擾����ׂ̊֐��Q
		  function scrollX(){return document.documentElement.scrollLeft || document.body.scrollLeft;}
		  function scrollY(){return document.documentElement.scrollTop || document.body.scrollTop;}
		  function getPosT (event) {
		    var mouseX = event.touches[0].clientX - $(canvas).position().left + scrollX();
		    var mouseY = event.touches[0].clientY - $(canvas).position().top + scrollY();
		    return {x:mouseX, y:mouseY};
		  }
		                                   
		  // �F�Ɛ��̑�����ݒ肷��֐�
		  $("#black").click(function () {c.strokeStyle = "black";});
		  $("#blue").click(function () {c.strokeStyle = "blue";});
		  $("#red").click(function () {c.strokeStyle = "red";});
		  $("#green").click(function () {c.strokeStyle = "green";});
		  $("#small").click(function () {c.lineWidth = 5;});
		  $("#middle").click(function () {c.lineWidth = 10;});
		  $("#large").click(function () {c.lineWidth = 20;});
		 
		  // �폜�{�^���̓���                                 
		  $("#delete_button").click(function () {
		    c.clearRect(0, 0, $(canvas).width(), $(canvas).height());
		  });

		  // �߂�{�^���̓���                                 
		  $("#back_button").click(function () {
			window.history.back();
		  });

	    // canvas���摜�ŕۑ�
	    $("#save_button").click(function(){
	        //canvas = document.getElementById("canvas");
	        var base64 = canvas.toDataURL("image/png");

			// �ǉ�����v�f��p�ӂ��܂��B
			document.getElementById('base64').value=base64; 

			var buttonObject = document.getElementById('input_submit');
			buttonObject.click();

		});

		}, false);