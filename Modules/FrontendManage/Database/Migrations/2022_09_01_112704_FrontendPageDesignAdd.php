<?php

use Illuminate\Database\Migrations\Migration;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\FrontendManage\Entities\PrivacyPolicy;

class FrontendPageDesignAdd extends Migration
{
    public function up()
    {
        $privacy = PrivacyPolicy::first();
        $frontend = FrontPage::where('slug', '/privacy')->first();
        $frontend->title = $privacy->page_banner_title;
        $frontend->sub_title = $privacy->page_banner_sub_title;
        $frontend->banner = $privacy->page_banner;
        $frontend->details = $this->container($privacy->details, $privacy->page_banner_title, $privacy->page_banner_sub_title);
        $frontend->save();
    }


    public function container($details, $title = '', $subtitle = '')
    {
        $imagePath = asset('public/frontend/infixlmstheme/img/new_bread_crumb_bg.png');

        $html = "
    <div class='row'>
        <div class='col-sm-12 ui-resizable' data-type='container-content'>

            <div class='breadcrumb_area' style='background-image: url(".$imagePath.");'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='breadcam_wrap'>
                                <h3>".$title." </h3>
                                 <p>". __('frontend.Home')." / ".$subtitle." </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-sm-12 ui-resizable' data-type='container-content'>
        <div class='courses_area'><div class='container'><div class='row justify-content-center'><div class='col-lg-12'>

            " . $details . "

            </div></div></div></div>
        </div>
    </div>";


        return $html;
    }

    public function down()
    {

    }
}
