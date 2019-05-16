<?php

/**
 * Customize paginator to match bootstrap styles
 *
 */

return [
    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}" tabindex="-1">Previous</a></li>',
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">Previous</a></li>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="{{url}}"><strong>{{text}}</strong></a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">Next</a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}" tabindex="-1">Next</a></li>',
];
