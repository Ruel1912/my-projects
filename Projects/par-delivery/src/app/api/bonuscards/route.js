import { deleteBonusCards } from "@/app/database/delete_modals";
import { getBonusCards } from "@/app/database/get_modals";
import { postBonusCards } from "@/app/database/post_modals";
import { NextRequest, NextResponse } from "next/server";

export const GET = async (req) => {
  const { searchParams } = new URL(req.url);
  const userid = searchParams.get("userid");
  try {
    const { bonusCards, error } = await getBonusCards(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ bonusCards });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["GET"]);
  NextResponse.end("l0l");
};

export const DELETE = async (req) => {
  const { searchParams } = new URL(req.url);
  const userid = searchParams.get("userid");
  try {
    const { bonusCards, error } = await deleteBonusCards(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ bonusCards });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["DELETE"]);
  NextResponse.end("l0l");
};

export const POST = async (req) => {
  try {

    const data = await req.json()
    const { bonusCards, error } = await postBonusCards(data);
    if (error) throw new Error(error);

    return NextResponse.json({ bonusCards });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }
 
  NextResponse.setHeader("Allow", ["POST"]);
  NextResponse.end("l0l");
};
