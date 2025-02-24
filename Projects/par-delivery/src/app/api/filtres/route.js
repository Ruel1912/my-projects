import { NextResponse } from "next/server";
import { getGroup, getGroupName } from "./group";
export async function GET(req){
    const {searchParams} = new URL(req.url)
    const tab = searchParams.get('tab')
    const other = searchParams.get('other')
    let data
    if (tab){
        data = await getGroup(tab)
    }
    if (tab,other){
        data = await getGroupName(tab, other)
    }

    return NextResponse.json({data})
}