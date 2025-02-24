import { deletePhones } from "@/app/database/delete_modals";
import { getPhones } from "@/app/database/get_modals";
import { postPhones } from "@/app/database/post_modals";
import { NextResponse } from "next/server";

export const GET = async (req) => {
  const { searchParams } = new URL(req.url);
  const userid = searchParams.get("userid");
  try {
    const { phones, error } = await getPhones(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ phones });
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
    const { phones, error } = await deletePhones(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ phones });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["DELETE"]);
  NextResponse.end("l0l");
};

export const POST = async (req) => {
  try {

    const data = await req.json()
    const { phones, error } = await postPhones(data);
    if (error) throw new Error(error);

    return NextResponse.json({ phones });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }
 
  NextResponse.setHeader("Allow", ["POST"]);
  NextResponse.end("l0l");
};