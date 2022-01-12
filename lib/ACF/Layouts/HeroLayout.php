<?php
/**
 * Copyright (c) 2021. Geniem Oy
 */

namespace TMS\Theme\Vesi\ACF\Layouts;

use Geniem\ACF\Exception;
use TMS\Theme\Base\ACF\Layouts\BaseLayout;
use TMS\Theme\Vesi\ACF\Fields\HeroFields;
use TMS\Theme\Base\Logger;

/**
 * Class HeroLayout
 *
 * @package TMS\Theme\Base\ACF\Layouts
 */
class HeroLayout extends BaseLayout {

    /**
     * Layout key
     */
    const KEY = '_hero';

    /**
     * Create the layout
     *
     * @param string $key Key from the flexible content.
     */
    public function __construct( string $key ) {
        parent::__construct(
            'Hero',
            $key . self::KEY,
            'hero'
        );

        $this->add_layout_fields();
    }

    /**
     * Add layout fields
     *
     * @return void
     */
    private function add_layout_fields() : void {
        $fields = new HeroFields(
            $this->get_label(),
            $this->get_key(),
            $this->get_name()
        );

        try {
            $this->add_fields(
                $this->filter_layout_fields( $fields->get_fields(), $this->get_key(), self::KEY )
            );
        }
        catch ( Exception $e ) {
            ( new Logger() )->error( $e->getMessage(), $e->getTrace() );
        }
    }
}
