import { isEmpty } from "lodash";
import *as SvgIcons from "../../../icons/index";

export const getIconComponent=(option)=>{
    const IconsMap={
        dos:SvgIcons.Check,
        donts:SvgIcons.Cross
    }

    return (! isEmpty(option)) && (option in IconsMap) ? IconsMap[option] : IconsMap['dos'];
}