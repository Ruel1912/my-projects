import { getOrders } from "@/app/database/get_modals";
import { postOrders } from "@/app/database/post_modals";
import { NextResponse } from "next/server";

export const GET = async (req) => {
  const { searchParams } = new URL(req.url);
  const userid = searchParams.get("userid");
  try {
    const { orders, error } = await getOrders(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ orders });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["GET"]);
  NextResponse.end("l0l");
};

export const POST = async (req) => {
  try {
    const data = await req.json();
    const { orders, error } = await postOrders(data);
    if (error) throw new Error(error);
    return NextResponse.json({ orders });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};