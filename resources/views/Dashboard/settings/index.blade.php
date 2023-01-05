@extends('layouts.dashboard')
@section('content')
<style type="text/css">
	.settings-tab-opener{
		box-shadow: 0px 6px 12px #ebebeb;
    	border-radius:11px;
    	cursor: pointer;
    	width:80px;height: 45px;
	}
	.settings-tab-opener.active{
		box-shadow: 0px 6px 12px #c8e0ff;
		color: #fff;
		background: #2196f3;
	}
	.taber:not(.active){
		display: none;
	}

</style>
<div class="col-12 p-3 row">
	 <div class="col-12 p-2 p-lg-4 main-box" style="min-height: 80vh;border-radius:10px">
	 	<div class="col-12 px-3 pb-3 pt-2">
	 		<h4 class="font-4">إعدادات الموقع</h4>
	 	</div>
	 	<div class="col-12 row" >
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener active" data-opentab="general-tab">
				<span  class="fal fa-wrench me-2"></span>	عام
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="appearance-tab">
				<span  class="fal fa-paint-roller me-2"></span>	مظهر
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="links-tab">
				<span  class="fal fa-link me-2"></span>	روابط
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="pages-tab">
				<span  class="fal fa-pager me-2"></span>	صفحات
			</div>
			 <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="codes-tab">
				<span  class="fal fa-code me-2"></span>	 الهواتف
			</div>
			{{-- <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener" data-opentab="others-tab">
				<span  class="fal fa-cogs me-2"></span>	اخرى
			</div> --}}
		</div>
	 	<form class="col-12 row " id="validate-form" method="get" action="" enctype="multipart/form-data" >
	 	@csrf
	 	<div class="col-12 col-lg-8 px-3 py-5">

	 		<div class="col-12 row p-0 taber active" id="general-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اسم الموقع
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="" name="site_name" class="form-control" value=""  maxlength="190">
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				العنوان
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="address" class="form-control"></textarea>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				عن الموقع
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="website_bio" class="form-control"></textarea>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				بريد التواصل
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="email" name="contact_email" class="form-control" >
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				لوجو الموقع (200*200)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللوجو عريض (500*200)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_wide_logo" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				الصورة المصغرة (50*50)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="website_icon" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
	 		</div>
	 		<div class="col-12 row p-0 taber" id="appearance-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				غلاف الموقع (800*500)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="site_cover" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div>
		 		</div>
		 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللون الرئيسي
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="main_color"  value="{{$settings->main_color}}" maxlength="190">
		 			</div>
		 		</div> --}}
		 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				اللون الفرعي
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="hover_color"  value="{{$settings->hover_color}}" maxlength="190">
		 			</div>
		 		</div> --}}
		 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
		 				الوضع الليلي في لوحة التحكم
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" id="DarkModeInput" name="dashboard_dark_mode" {{$settings->dashboard_dark_mode==1?"checked":""}} value="1">
						</div>
		 			</div>
		 		</div> --}}
		 	</div>
		 	<div class="col-12 row p-0 taber" id="links-tab">

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رقم واتس آب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="whatsapp" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط فيس بوك
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="facebook" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تويتر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="twitter" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط انستجرام
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="instagram" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط يوتيوب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="youtube" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تيلي جرام
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="telegram" class="form-control" value="" >
	 			</div>
	 		</div>
	 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط واتس أب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="whatsapp_link" class="form-control" value="{{$settings->whatsapp_link}}" >
	 			</div>
	 		</div> --}}
	 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط تيك توك
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="tiktok_link" class="form-control" value="{{$settings->tiktok_link}}" >
	 			</div>
	 		</div> --}}
	 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط نفذلي
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="nafezly_link" class="form-control" value="{{$settings->nafezly_link}}" >
	 			</div>
	 		</div> --}}
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط لينكد ان
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="linkedIn" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط جيت هب
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="github" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 1
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="link1" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 2
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="link2" class="form-control" value="" >
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				رابط مخصص 3
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="link3" class="form-control" value="" >
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="pages-tab">

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				تواصل معنا
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="contact_page" class="form-control editor with-file-explorer"></textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>
	 	</div>

         <div class="col-12 row p-0 taber" id="codes-tab">
            <h3 class="col-12 mb-5 text-center text-primary text-bold">الإدارة</h3>

            <div class="col-12 px-0 d-flex mb-3 row pb-3">
                <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    رقم هاتف الإدارة1
                </div>
                <div class="col-12 col-lg-9 px-2">
                    <input type="" name="manager_phone1" class="form-control" value="" maxlength="190">
                </div>
            </div>
            <div class="col-12 px-0 d-flex mb-3 row pb-3">
                <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                   رقم هاتف الإدارة2
               </div>
                <div class="col-12 col-lg-9 px-2">
                    <input type="" name="manager_phone2" class="form-control" value="" maxlength="190">
                </div>
            </div>
                               <h3 class="col-12 mb-5 text-center text-primary text-bold">المبيعات</h3>
            <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    برامج الحسابات والخدمات البرمجية1
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_programAndService_phone1" class="form-control" value="" maxlength="190">
               </div>
           </div>
           <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    برامج الحسابات والخدمات البرمجية2
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_programAndService_phone1" class="form-control" value="" maxlength="190">
               </div>
           </div>
           <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    تك المعلومات والانظمة الامنية1
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_it_phone1" class="form-control" value="" maxlength="190">
               </div>
           </div>
           <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    تك المعلومات والانظمة الامنية2
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_it_phone2" class="form-control" value="" maxlength="190">
               </div>
           </div>
           <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    خدمات التسويق الاكتروني1
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_marketingService_phone1" class="form-control" value="" maxlength="190">
               </div>
           </div>
           <div class="col-12 px-0 d-flex mb-3 row pb-3">
               <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    خدمات التسويق الاكتروني2
              </div>
               <div class="col-12 col-lg-9 px-2">
                   <input type="" name="sales_marketingService_phone2" class="form-control" value="" maxlength="190">
               </div>
           </div>


               <h3 class="col-12 mb-5 text-center text-primary text-bold">الدعم الفني</h3>

               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        برامج الحسابات والخدمات البرمجية1
                  </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_programAndService_phone1" class="form-control" value="" maxlength="190">
                   </div>
               </div>
               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        برامج الحسابات والخدمات البرمجية2
                  </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_programAndService_phone2" class="form-control" value="" maxlength="190">
                   </div>
               </div>
               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        تك المعلومات والانظمة الامنية1
                  </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_it_phone1" class="form-control" value="" maxlength="190">
                   </div>
               </div>
               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                    تك المعلومات والانظمة الامنية2

                </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_it_phone2" class="form-control" value="" maxlength="190">
                   </div>
               </div>
               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        خدمات التسويق الاكتروني1
                  </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_marketingService_phone1" class="form-control" value="" maxlength="190">
                   </div>
               </div>
               <div class="col-12 px-0 d-flex mb-3 row pb-3">
                   <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                        خدمات التسويق الاكتروني2
                  </div>
                   <div class="col-12 col-lg-9 px-2">
                       <input type="" name="technical_marketingService_phone2" class="form-control" value="" maxlength="190">
                   </div>
               </div>

         </div>
	 	{{-- <div class="col-12 row p-0 taber" id="codes-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				كود الهيدر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="header_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->header_code}}</textarea>
	 			</div>
	 		</div> --}}
	 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				كود الفوتر
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="footer_code" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->footer_code}}</textarea>
	 			</div>
	 		</div> --}}
	 		{{-- <div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				ملف robots
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="robots_txt" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings->robots_txt}}</textarea>
	 			</div>
	 		</div> --}}
	 	</div>
	 	<div class="col-12 row p-0 taber" id="others-tab">
	 	</div>

	 </div>

	 	<div class="col-12 col-lg-8 px-0 d-flex mb-3 row pb-3">

 		 	<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">

	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">حفظ التغييرات</button>
	 			</div>
	 		</div>

 		</div>

	  	</form>
	 </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('.settings-tab-opener').on('click',function(){
		$('.settings-tab-opener').removeClass('active');
		$(this).addClass('active');
		var open_id = $(this).attr('data-opentab');
		$('.taber').removeClass('active');
		$('.taber#'+open_id).addClass('active');
	});
</script>
@endpush

