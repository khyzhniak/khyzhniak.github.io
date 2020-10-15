<ul class="job_listings">
    <?php
    $current_page = $_GET['page']; // текущая страница
    $post_type = 'jobs'; // имя custom post type
    // если GET параметр пустой, то принимаем, что текущая страница равна 1
    if (empty($current_page)) {
        $current_page = 1;
    }
    // аргументы, передаваемые в запрос
    $args = array(
        'post_type' => $post_type, // custom post type
        'posts_per_page' => 10,         // количество постов на одной странице
        'paged' => $current_page,      // задаем номер страницы, которую хотим отобразить
    );
    $projects = new WP_Query($args); // отправляем запрос
    if ($projects->have_posts()) :
        while ($projects->have_posts()) : $projects->the_post(); ?>
            <li>
                <div class="job_listings_img">
                    <?php

                    $image = get_field('img_vacancy');
                    if (get_field('img_vacancy') != '') {
                        echo '<img src="' . get_field('img_vacancy') . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
                    } ?>
                </div>
                <div class="job-list-content">
                    <div class="job-list-contentTitle">
                        <a href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4>
                        </a>
                        <?php
                        if (have_rows(contract_vacancy)):while (have_rows(contract_vacancy)): the_row();
                            ?>
                            <span class="job-type"> <?php echo get_sub_field('contract_vacancy_item'); ?></span>
                        <? endwhile; endif; ?>
                    </div>
                    <div class="job-icons">
                                                <span class="ws-meta-company-name">
                                                    <?php
                                                    if (get_field('name_place_vacancy') != '') {
                                                        echo '<i class="fa fa-briefcase"></i>';
                                                    }
                                                    the_field('name_place_vacancy'); ?>
                                                </span>
                        <span class="ws-meta-job-location">
                                    <?php
                                    if (get_field('what_place') != '') {
                                        echo '<i class="fa fa-map-marker"></i>';
                                    }
                                    the_field('what_place'); ?>
                                                </span>
                        <span class="ws-meta-salary">
                                    <?php
                                    if (get_field('salary_vacancy') != '') {
                                        echo '<i class="fa fa-money"></i>';
                                    }
                                    the_field('salary_vacancy'); ?>
                                                </span>
                        <span class="ws-meta-job-date">
                                                     <i class="fa fa-calendar"></i> Добавлено <?php echo get_the_date('n/j/Y'); ?>
                                                </span>
                    </div>
                    <div class="listing-desc">
                        <p><?php the_field('descript_vacancy'); ?></p>
                    </div>
                    <a class="btn-1 btn-2" href="<?php the_permalink() ?>">Подробнее</a>
                </div>
            </li>

        <?php endwhile;
        if ($projects->max_num_pages > 1) : // если максимальное количество страниц больше 1, то выводим пагинацию
            if ($projects->max_num_pages > $current_page && $current_page > 1) : ?>
                <div class="pagin">
                    <a href="<?php prevlink($current_page) ?>">Предыдущая страница</a>
                    <a href="<?php nextlink($current_page) ?>">Следующая страница</a>
                </div>
            <?php elseif ($current_page == 1) : ?>
                <div class="pagin">
                    <a href="<?php nextlink($current_page) ?>">Следующая страница</a>
                </div>

            <?php elseif ($current_page == $projects->max_num_pages) : ?>
                <div class="pagin">
                    <a href="<?php prevlink($current_page) ?>">Предыдущая страница</a>
                </div>
            <?php endif;
        endif;
    endif;
    ?>
</ul>

<div class="vacancy_pageRight">
    <?php query_posts('orderby=rand&showposts=3'); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="unit_blog_left_wrp">
                <h2><?php the_title(); ?></h2>
                <!--                        --><?php //the_field('short_text'); ?>
                <?php if (get_field('preview') != '') {
                    echo '<img src="' . get_field('preview') . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
                } ?>
                <a href="<?php the_permalink(); ?>" class="btn-1 btn-2">Читать</a>

            </div>
        <?php endwhile; endif; ?>
</div>
/////////////////////////
//repeater
/////////////////
<?php if (have_rows(sliderContent, 8)):while (have_rows(sliderContent, 8)): the_row(); ?>
    <?php echo get_sub_field(slideTitle) ?>
<?php endwhile; endif; ?>/////////////////////////
//repeater with if
/////////////////
<?php if (have_rows(sliderContent, 8)):while (have_rows(sliderContent, 8)): the_row();
 if (get_sub_field('bool_train') == true) {?>
    <?php echo get_sub_field(slideTitle) ?>
<?php }endwhile; endif; ?>
//////////////////////////////////////
///one field
<?php echo get_field(projectNumb1,8)?>
//////////////////////////
