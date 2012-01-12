<?php
/**
 * @package mhdash
 * @subpackage dashboard
 */
class modDashboardWidgetMarkHamstraFeed extends modDashboardWidgetInterface {
    /**
     * @var modRSSParser $rss
     */
    public $rss;

    /**
     * @return string
     */
    public function render() {
        $this->modx->loadClass('xmlrss.modRSSParser','',false,true);
        $this->rss = new modRSSParser($this->modx);

        $o = array();
        $url = 'http://www.markhamstra.com/rss-feed.rss';
        $rss = $this->rss->parse($url);
        if ($rss) {
            foreach (array_keys($rss->items) as $key) {
                $item= &$rss->items[$key];
                $item['pubdate'] = strftime('%c',$item['date_timestamp']);
                $o[] = $this->getFileChunk('dashboard/rssitem.tpl',$item);
            }
            return implode("\n",$o);
        } else {
            return $this->modx->lexicon('mhdash.feedunavailable');
        }
    }
}
return 'modDashboardWidgetMarkHamstraFeed';
