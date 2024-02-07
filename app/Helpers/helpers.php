<?php

function textDirection($locale)
{
    return $locale == 'ar' ? 'rtl' : 'ltr';
}
function fontNameForArabic($locale, $case1, $case2)
{
    return $locale == 'ar' ? $case1 : $case2;
}