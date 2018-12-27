<?php
  /**
   * The template for the menu container of the panel.
   * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
   *
   * @author     Redux Framework
   * @package    ReduxFramework/Templates
   * @version:    3.5.4
   */
?>
<div class="redux-sidebar">
    <ul class="redux-group-menu">
      <li class="etheme-theme-info"> 

      <?php 
        $out = '';
        $out .= '<span class="activate-note activated">';
          $out .= ( etheme_is_activated() ) ? esc_html__('Activated', 'xstore') : esc_html__('Not activated', 'xstore') ;
        $out .= '</span>';

        $out .= '<span class="theme-logo"><img src="' . ETHEME_BASE_URI . ETHEME_CODE .'assets/images/admin-logo.png" alt="logo"></span>';

        if ( is_child_theme() ) {
          $parent = wp_get_theme( 'xstore' );
          $parent = $parent->version;
          $child = $this->parent->args['display_version'];

          $out .= '<span class="theme-version">' . $parent . ' (child  ' . $child . ')</span>';
        } else {
          $out .= '<span class="theme-version">' . $this->parent->args['display_version'] . '</span>';
        }
        echo $out;

      ?>

      </li>
<?php
        foreach ( $this->parent->sections as $k => $section ) {
          $title = isset ( $section['title'] ) ? $section['title'] : '';
          $skip_sec = false;
          foreach ( $this->parent->hidden_perm_sections as $num => $section_title ) {
            if ( $section_title == $title ) {
              $skip_sec = true;
            }
          }
          if ( isset ( $section['customizer_only'] ) && $section['customizer_only'] == true ) {
            continue;
          }
          if ( false == $skip_sec ) {
            echo $this->parent->section_menu( $k, $section );
            $skip_sec = false;
          }
        }
        /**
         * action 'redux/page/{opt_name}/menu/after'
         *
         * @param object $this ReduxFramework
         */
        do_action( "redux/page/{$this->parent->args[ 'opt_name' ]}/menu/after", $this );
?>
    </ul>
</div>