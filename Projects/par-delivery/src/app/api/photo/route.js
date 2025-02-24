import { NextResponse } from "next/server";
import { getPhoto } from "./photo";
export async function GET(req){
    const {searchParams} = new URL(req.url)
    let data;
    const link = searchParams.get('link')
    if (link){
        data = await getPhoto(link)
    }
    return NextResponse.json(data)
}