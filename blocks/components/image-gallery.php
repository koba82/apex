<?php
if(!isset($component)) :
    $component = $args;
endif;

$slider_id = rand (9999, 99999);
$id = rand (9999, 99999);
$images = $component['images'];
$display_caption = $component['caption'];

?>

<div class="image-gallery">
    <div class="main-image">
        <div class="content-image-wrap">
            <a data-href="<?=$images[0]['sizes']['main-image-size']; ?>"
               data-image='{"imageMain" : "<?=$images[0]['sizes']['main-image-size']; ?>",
                            "imageLarge" : "<?=$images[0]['sizes']['image-800']; ?>",
                            "imageThumb" : "<?=$images[0]['sizes']['image-400']; ?>",
                            "imagePosition" : "0",
                            "lightbox" : "<?=$id; ?>"}'
               data-lightbox-id="<?=$id; ?>" class="content-image" <?=($image[0]['alt']) ? 'title="' . $image[0]['alt'] . '"' : '';?>>
                <img src="<?=$images[0]['sizes']['image-800']; ?>"/>
                <div class="content-image-overlay">
                    <div class="icon-wrap medium">
                        <?=display_icon('zoom-in'); ?>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="image-reel flex-slider-<?=$slider_id; ?>">
        <?php foreach($images as $key => $image) : ?>

            <div class="content-image" data-href="<?=$image['sizes']['main-image-size']; ?>" data-lightbox-id="<?=$id; ?>">
                <img src="<?=$image['sizes']['image-400']; ?>"
                     data-image='{"imageMain" : "<?=$image['sizes']['main-image-size']; ?>",
                            "imageLarge" : "<?=$image['sizes']['image-800']; ?>",
                            "imageThumb" : "<?=$image['sizes']['image-400']; ?>",
                            "imagePosition" : "<?php echo $key;?>",
                            "lightbox" : "<?=$id; ?>"}'
                     data-img-main="<?=$image['sizes']['image-800']; ?>" data-img-lg="<?=$image['sizes']['main-image-size']; ?>"/>
                <div class="content-image-overlay">
                    <div class="icon-wrap medium">
                        <?=display_icon('chevron-up'); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        window.addEventListener('load', function () {

            let imageReel = document.querySelectorAll('.image-reel .content-image');
            for (let i = 0; i < imageReel.length; i++) {
                imageReel[i].addEventListener("click", function() {
                    let imageData = JSON.parse(this.querySelector('img').getAttribute('data-image'));
                    let mainImage = document.querySelector('.main-image a');
                    mainImage.setAttribute('data-image', JSON.stringify(imageData));
                    mainImage.setAttribute('data-href', imageData['imageMain']);
                    mainImage.querySelector('img').setAttribute('src', imageData['imageLarge']);

                });
            }


            let elem<?=$id; ?> = document.querySelector('.flex-slider-<?=$slider_id; ?>');
            let flkty<?=$id; ?> = new Flickity( elem<?=$id; ?>, {
                cellAlign: 'left',
                contain: false,
                percentPosition: false,
                freeScroll: true,
                wrapAround: false,
                autoPlay: false,
                pageDots: false,
                prevNextButtons: true,
                groupCells: 3,
                arrowShape: {
                    x0: 10,
                    x1: 60, y1: 50,
                    x2: 60, y2: 50,
                    x3: 60
                }
            });

            jQuery('[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox({sourceAttr: 'data-href'});

        });
    </script>




</div>


