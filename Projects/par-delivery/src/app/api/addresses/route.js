import { deleteAddresses } from "@/app/database/delete_modals";
import { getAddresses } from "@/app/database/get_modals";
import { patchAddresses } from "@/app/database/patch_modals";
import { postAddresses } from "@/app/database/post_modals";
import { NextResponse } from "next/server";

export const GET = async (req) => {
  const { searchParams } = new URL(req.url);
  const userid = searchParams.get("userid");
  try {
    const { addresses, error } = await getAddresses(userid);
    if (error) throw new Error(error);

    return NextResponse.json({ addresses });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["GET"]);
  NextResponse.end("l0l");
};

export const DELETE = async (req) => {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  try {
    const { addresses, error } = await deleteAddresses(id);
    if (error) throw new Error(error);
    return NextResponse.json({ addresses });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};

export const POST = async (req) => {
  try {
    const data = await req.json();
    const { addresses, error } = await postAddresses(data);
    if (error) throw new Error(error);

    return NextResponse.json({ addresses });
  } catch (error) {
    NextResponse.json({ error: error.message });
  }

  NextResponse.setHeader("Allow", ["POST"]);
  NextResponse.end("l0l");
};

export const PUT = async (req) => {
  try {
    const data = await req.json();
    const { addresses, error } = await patchAddresses(data);
    if (error) throw new Error(error);
    return NextResponse.json({ addresses });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};
