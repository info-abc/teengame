function menushow(){$("#cssmenu").addClass("menushow"),$(".glass").css({display:"block"}),$("#searchmenu").focus().val("")}function menuhide(){$("#cssmenu").removeClass("menushow"),$(".glass").css({display:"none"})}$(document).ready(function(){$("#cssmenu ul ul li:odd").addClass("odd"),$("#cssmenu ul ul li:even").addClass("even"),$("#cssmenu > ul > li > a").click(function(){$("#cssmenu li").removeClass("active"),$(this).closest("li").addClass("active");var s=$(this).next();return s.is("ul")&&s.is(":visible")&&($(this).closest("li").removeClass("active"),s.slideUp("normal")),s.is("ul")&&!s.is(":visible")&&($("#cssmenu ul ul:visible").slideUp("normal"),s.slideDown("normal")),0==$(this).closest("li").find("ul").children().length?!0:!1}),dw_Tooltip.defaultProps={supportTouch:!0,content_source:"class_id"}}),$(document).mouseup(function(s){var e=$("#cssmenu");e.is(s.target)||0!==e.has(s.target).length||menuhide()});