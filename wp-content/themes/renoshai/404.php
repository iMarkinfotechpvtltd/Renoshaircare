<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

    <div id="primary">
        <section class="error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="error_section">
                            <h1>Page Not Found</h1>
                            <p>The page you requested could not be found.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="error_main_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="error_btm_cntnt">
                            <h1>404 <i class="icon icon-file-text"></i></h1>
                            <p>We are sorry, but the page you were looking for doesn't exist.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>
