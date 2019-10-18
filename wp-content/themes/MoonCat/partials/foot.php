        </div>
    </div>
    <footer id="footer" class="footer">
    <?php if ( get_theme_mod( 'layout_backtotop', 1 ) ): ?>
        <div id="back-top-wrapper" class="visible-desktop">
            <p id="back-top">
                <a href="#top"><span></span></a>
            </p>
        </div>
    <?php endif; ?>
        <div class="container clearfix">
                <div class="row">
                    <div class="span6 footer-widgets">
                    <?php if ( ! dynamic_sidebar( 'Footer Left' ) ) : ?>
                        <!--Widgetized Footer-->
                    <?php endif ?>
                    </div>
                    <div class="span6 footer-widgets">
                    <?php if ( ! dynamic_sidebar( 'Footer Right' ) ) : ?>
                        <!--Widgetized Footer-->
                    <?php endif ?>
                    </div>
                </div>
        </div><!--/Container-->
    </footer>
</div><!--#main-->