<?php

$head = array(
	'title' => 'Template',
);

$bottom = array(
	'user' => 'Munir',
	'user_menu' => array(
		'<span class="glyphicon glyphicon-search"></span> Buka Google' => 'http://www.google.com',
		'<span class="glyphicon glyphicon-plane"></span> Iseng' => 'http://www.nyaa.eu',
		'<span class="glyphicon glyphicon-off"></span> Log Out' => '#',
	),
);

$requests = array(
	array(
		'name' => 'ITB',
		'owner' => 'PMI',
		'date' => '12 Desember',
		'list' => array(
			'home' => 200,
			'cutlery' => 1000
		)
	),
	array(
		'name' => 'UNIKOM',
		'owner' => 'PMI',
		'date' => '12 Desember',
		'list' => array(
			'home' => 400,
			'plus-sign' => 400
		)
	),
	array(
		'name' => 'GSATE',
		'owner' => 'BPBD',
		'date' => '16 Desember',
		'list' => array(
			'home' => 400,
			'plus-sign' => 400
		)
	),
	array(
		'name' => 'BIP',
		'owner' => 'PEMDA',
		'date' => '15 Desember',
		'list' => array(
			'home' => 100,
			'plus-sign' => 50
		)
	),
	array(
		'name' => 'HSADIKIN',
		'owner' => 'HSADIKIN',
		'date' => '14 Desember',
		'list' => array(
			'home' => 500,
			'cutlery' => 400
		)
	),
	array(
		'name' => 'DAGO',
		'owner' => 'PMI',
		'date' => '12 Desember',
		'list' => array(
			'home' => 600,
			'cutlery' => 1400
		)
	),
	array(
		'name' => 'DJUANDA',
		'owner' => 'BPBD/PEMDA',
		'date' => '15-16 Desember',
		'list' => array(
			'home' => 500,
			'plus-sign' => 450
		)
	),
	array(
		'name' => 'CICENDO',
		'owner' => 'HSADIKIN',
		'date' => '14 Desember',
		'list' => array(
			'home' => 500,
			'cutlery' => 400
		)
	),
	array(
		'name' => 'BANDUNG',
		'owner' => '',
		'date' => '12-16 Desember',
		'list' => array(
			'home' => 1600,
			'cutlery' => 1800,
			'plus-sign' => 450
		)
	),
);

?>
<html style="height:100%">
	<body style="height:100%">
		
		<div class="container-map" style="height:500px;">
			<div id="map-canvas"></div>
			<div class='map-panel'>
				<h4 style='text-align:center'>Panel Konfirmasi</h4>
				<table class='table-condensed table-striped'>
					<tr><td>Lokasi</td><td id='panel-lokasi'></td></tr>
					<tr><td>Peminta</td><td id='panel-peminta'></td></tr>
					<tr><td>Deadline</td><td id='panel-deadline'></td></tr>
					<tr><td>Bantuan</td><td id='panel-bantuan'></td></tr>	
						
				</table>
				<br/>
				<button class='btn btn-primary'>Kirim</button>
			</div>
			
			<div class="map-requests">
			<!--
				<?php foreach ($requests as $request): ?>
					--><div id="map-request-<?= $request['name'] ?>" class="map-request">
						<div class="map-request-name"><?= $request['name'] ?></div>
						<div class="map-request-owner"><?= $request['owner'] ?></div>
						<div class="map-request-date"><?= $request['date'] ?></div>
						<ul class="map-request-list">
						<?php foreach ($request['list'] as $name => $count): ?>
							<li><span class="glyphicon glyphicon-<?= $name ?>"></span> <?= $count ?></li>
						<?php endforeach ?>
						</ul>
					</div><!--
				<?php endforeach ?>
			-->
			</div>
			
		</div>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKKdHe2kfdhW4NXkLoIwFkLw0HOvKibc0"></script>
		<script type="text/javascript">
		(function (){

			'use strict';
			
			RequestOverlay.prototype = new google.maps.OverlayView();
			function RequestOverlay(name, lat, lng, map) {
				
				this.name_ = name;
				this.lat_ = lat;
				this.lng_ = lng;
				this.map_ = map;
				this.div_ = null;
				
				this.setMap(map);
			}
			RequestOverlay.prototype.onAdd = function() {

				var div = document.getElementById('map-request-' + this.name_);
				this.div_ = div;

				var panes = this.getPanes();
				panes.overlayMouseTarget.appendChild(div);
			};
			RequestOverlay.prototype.draw = function() {
			
				var latlng = new google.maps.LatLng(this.lat_, this.lng_);

				var overlayProjection = this.getProjection();
				var pos = overlayProjection.fromLatLngToDivPixel(latlng);

				var div = this.div_;
				div.style.left = pos.x + 'px';
				div.style.top = pos.y + 'px';
				
			};
			RequestOverlay.prototype.hide = function() {
				if (this.div_) {
					this.div_.style.visibility = 'hidden';
				}
			};
			RequestOverlay.prototype.show = function() {
				if (this.div_) {
					this.div_.style.visibility = 'visible';
				}
			};
			RequestOverlay.prototype.toggle = function() {
				if (this.div_) {
					if (this.div_.style.visibility == 'hidden') {
						this.show();
					} else {
						this.hide();
					}
				}
			};

			function initialize() {
				var mapOptions = {
					center: { lat: -6.8919551, lng: 107.6149544 },
					zoom: 12
				};
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				
				var overlayITB = new RequestOverlay('ITB',      -6.8916888, 107.6107272, map);
				var overlayUNIKOM = new RequestOverlay('UNIKOM',   -6.8885254, 107.6164028, map);
				var overlayGSATE = new RequestOverlay('GSATE',    -6.9019672, 107.6187631, map);
				var overlayBIP = new RequestOverlay('BIP',      -6.9081182, 107.6115212, map);
				var overlayHSADIKIN = new RequestOverlay('HSADIKIN', -6.8985463, 107.5979669, map);

				var overlayDAGO = new RequestOverlay('DAGO',    (-6.8916888 + -6.8885254) / 2, (107.6107272 + 107.6164028) / 2, map);
				var overlayDJUANDA = new RequestOverlay('DJUANDA', (-6.9019672 + -6.9081182) / 2, (107.6187631 + 107.6115212) / 2, map);
				var overlayCICENDO = new RequestOverlay('CICENDO', -6.8985463, 107.5979669, map);
				var overlayBANDUNG = new RequestOverlay('BANDUNG', -6.8934111, 107.6125, map);
				
				function checkZoom() {
					var zoom = map.getZoom();
					if (zoom > 15) {
						     overlayITB.show();
						  overlayUNIKOM.show();
						   overlayGSATE.show();
						     overlayBIP.show();
						overlayHSADIKIN.show();
						    overlayDAGO.hide();
						 overlayDJUANDA.hide();
						 overlayCICENDO.hide();
						 overlayBANDUNG.hide();
					} else if (zoom > 13) {
						     overlayITB.hide();
						  overlayUNIKOM.hide();
						   overlayGSATE.hide();
						     overlayBIP.hide();
						overlayHSADIKIN.hide();
						    overlayDAGO.show();
						 overlayDJUANDA.show();
						 overlayCICENDO.show();
						 overlayBANDUNG.hide();
					} else if (zoom > 10) {
						     overlayITB.hide();
						  overlayUNIKOM.hide();
						   overlayGSATE.hide();
						     overlayBIP.hide();
						overlayHSADIKIN.hide();
						    overlayDAGO.hide();
						 overlayDJUANDA.hide();
						 overlayCICENDO.hide();
						 overlayBANDUNG.show();
					} else {
						     overlayITB.hide();
						  overlayUNIKOM.hide();
						   overlayGSATE.hide();
						     overlayBIP.hide();
						overlayHSADIKIN.hide();
						    overlayDAGO.hide();
						 overlayDJUANDA.hide();
						 overlayCICENDO.hide();
						 overlayBANDUNG.hide();
					}
				}
				checkZoom();
				google.maps.event.addListener(map, 'zoom_changed', checkZoom);
				
				function showPanel(name) {
					return function(){
						if (name == 'ITB'){
							updatePanelData('ITB','PMI','12 Desember 2014','200 kg batu bata, 1000 bungkus indomi');
						} else if (name == 'UNIKOM') {
							updatePanelData('UNIKOM','PMI','12 Desember 2014','400 kg batu bata, 400 bungkus indomi');
						} else if (name == 'GSATE') {
							updatePanelData('Gedung Sate','BPBD','16 Desember 2014','400 kg batu bata, 400 bungkus indomi');
						} else if (name == 'BIP') {
							updatePanelData('BIP','Pemda','15 Desember 2014','100 kg batu bata, 50 bungkus indomi');
						} else if (name =='HSADIKIN'){
							updatePanelData('RS Hasan Sadikin','RS Hasan Sadikin','14 Desember 2014','500 kg batu bata, 400 bungkus indomi');
						} else if (name == 'DAGO') {
							updatePanelData('Dago','PMI','14 Desember 2014','600 kg batu bata, 1400 bungkus indomi');
						} else if (name == 'DJUANDA') {
							updatePanelData('Jalan Juanda','Pemda','15-16 Desember 2014','500 kg batu bata, 450 bungkus indomi');
						} else if (name == 'CICENDO') {
							updatePanelData('Cicendo','RS Hasan Sadikin','14 Desember 2014','500 kg batu bata, 400 bungkus indomi');
						} else if (name == 'BANDUNG') {
							updatePanelData('Bandung','Bandung','12 - 16 Desember 2014','1600 kg batu bata, 1400 bungkus indomi');
						}
					}
					
					//return function(){
					//	//alert(name + " show");
				//	}
				}
				
				google.maps.event.addDomListener(document.getElementById('map-request-ITB'), 'click', showPanel('ITB'));
				google.maps.event.addDomListener(document.getElementById('map-request-UNIKOM'), 'click', showPanel('UNIKOM'));
				google.maps.event.addDomListener(document.getElementById('map-request-GSATE'), 'click', showPanel('GSATE'));
				google.maps.event.addDomListener(document.getElementById('map-request-BIP'), 'click', showPanel('BIP'));
				google.maps.event.addDomListener(document.getElementById('map-request-HSADIKIN'), 'click', showPanel('HSADIKIN'));
				google.maps.event.addDomListener(document.getElementById('map-request-DAGO'), 'click', showPanel('DAGO'));
				google.maps.event.addDomListener(document.getElementById('map-request-DJUANDA'), 'click', showPanel('DJUANDA'));
				google.maps.event.addDomListener(document.getElementById('map-request-CICENDO'), 'click', showPanel('CICENDO'));
				google.maps.event.addDomListener(document.getElementById('map-request-BANDUNG'), 'click', showPanel('BANDUNG'));
				
				/*
				google.maps.event.addListener(overlayITB, 'click', showPanel('ITB'));
				google.maps.event.addListener(overlayUNIKOM, 'click', showPanel('UNIKOM'));
				google.maps.event.addListener(overlayGSATE, 'click', showPanel('GSATE'));
				google.maps.event.addListener(overlayBIP, 'click', showPanel('BIP'));
				google.maps.event.addListener(overlayHSADIKIN, 'click', showPanel('HSADIKIN'));
				google.maps.event.addListener(overlayDAGO, 'click', showPanel('DAGO'));
				google.maps.event.addListener(overlayDJUANDA, 'click', showPanel('DJUANDA'));
				google.maps.event.addListener(overlayCICENDO, 'click', showPanel('CICENDO'));
				google.maps.event.addListener(overlayBANDUNG, 'click', showPanel('BANDUNG'));
				*/
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		})();

		function updatePanelData(lokasi,peminta,deadline,bantuan){
			$("#panel-lokasi").text(lokasi);
			$("#panel-peminta").text(peminta);
			$("#panel-deadline").text(deadline);
			$("#panel-bantuan").text(bantuan);
		}
		</script>
	</body>
</html>
