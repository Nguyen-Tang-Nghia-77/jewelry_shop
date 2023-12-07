<?php 
namespace App\Helpers;
use Config;

class Form {
    public static function show ($elements) { 
        $xhtml = null;
        foreach ($elements as $element) {
            $xhtml .= self::formGroup($element);
        }
        return $xhtml;
    }
    public static function formGroup ($element, $params = null) {
        $type = isset($element['type']) ? $element['type'] : "input";
        $xhtml = null;

        switch ($type) {
            case 'input':
                $xhtml .= sprintf(
                    '<div class="form-group row">
                        %s
                        <div class="col-sm-8 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'thumb':
                $xhtml .= sprintf(
                    '<div class="form-group row">
                        %s
                        <div class="col-sm-8 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>', $element['label'], $element['element'], $element['thumb']
                );
                break;
            case 'avatar':
                $xhtml .= sprintf(
                    '<div class="form-group row">
                        %s
                        <div class="col-sm-8 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>', $element['label'], $element['element'], $element['avatar']
                );
                break;
               
            case 'btn-submit':
                $xhtml .= sprintf(
                    '<div class="card-footer">
                        <div class="col-12 col-sm-8 offset-sm-2">
                        %s
                    <a href="%s" class="btn btn-sm btn-danger mr-1"> Cancel</a>
                </div>
            </div>', $element['element'], route($element['controllerName'])
                );
                break;
            case 'btn-submit-edit':
                $xhtml .= sprintf(
                    '<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            %s
                        </div>
                    </div>', $element['element']
                );
                break;
        }

        return $xhtml;
    }
 
}


