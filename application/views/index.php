<section class="TestProfSection noBgIm">
    <h2>Помощь при выборе специальности</h2>
    <div class="TestProfSectionBg">
        <div class="wrapper table">
            <div class="middle">
                <h3>&nbsp;Тест&nbsp;</h3>
                <div class="slider">
                    <?php foreach ($profession as $row):?>
                        <div>
                        <p><?=$row['name']?></p>
                        <a href="<?=base_url()?>welcome/start/<?=$row['table_name']?>">пройти</a>
                        </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
    <div id="planets-wrapper">
        <div id="planets">
            <div id="sun" class="planet animate">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/corporate-design.png" width="120" height="120">
            </div>
            <div class="mercury planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="95" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="46" height="46">
            </div>
            <div class="venus planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="120" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="60" height="60">
            </div>
            <div class="earth planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="135" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/werbeagentur-ingolstadt.png" width="60" height="60">
            </div>
            <div class="mars planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="165" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="50" height="50">
            </div>
            <div class="jupiter planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="180" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="90" height="90">
            </div>
            <div class="saturn planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="225" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="80" height="80">
                <img class="saturn-rings" src="<?=base_url()?>public/images/testimonials/werbeagentur-saturn.png" width="130" height="130">
            </div>
            <div class="uranus planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="260" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="60" height="60">
            </div>
            <div class="neptune planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg" width="275" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="70" height="70">
            </div>
            <div class="pluto planet animate">
                <img class="pbar" src="<?=base_url()?>public/images/testimonials/werbeagentur-design.jpg"  width="310" height="10">
                <img class="pball animate" src="<?=base_url()?>public/images/testimonials/responsive-webdesign.png" width="50" height="50">
            </div>
        </div>
        <div id="planets-shadow">
            <div class="mercury planet-shadow animate"></div>
            <div class="venus planet-shadow animate"></div>
            <div class="earth planet-shadow animate"></div>
            <div class="mars planet-shadow animate"></div>
            <div class="jupiter planet-shadow animate"></div>
            <div class="saturn planet-shadow animate"></div>
            <div class="uranus planet-shadow animate"></div>
            <div class="neptune planet-shadow animate"></div>
            <div class="pluto planet-shadow animate"></div>
        </div>
    </div>
</section>
