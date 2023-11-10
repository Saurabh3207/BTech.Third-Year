import hashlib
import os
from PIL import Image

# Function to calculate and save cryptographic hash values to a text file
def calculate_and_save_file_hash(file_path, hash_algorithm="sha256", output_file_path="hash_values.txt"):
    try:
        with open(file_path, "rb") as file:
            hash_obj = hashlib.new(hash_algorithm)
            for chunk in iter(lambda: file.read(4096), b""):
                hash_obj.update(chunk)
            hash_value = hash_obj.hexdigest()
            with open(output_file_path, "a") as output_file:
                output_file.write(f"{file_path}: {hash_value}\n")
            return hash_value
    except FileNotFoundError:
        return None

# Analyze image file metadata
def analyze_image_metadata(image_path):
    try:
        img = Image.open(image_path)
        metadata = img.info
        return metadata
    except Exception as e:
        return f"Error: {str(e)}"

# Prompt the user to choose between hash calculation and integrity check
choice1 = input("Choose the first action (hash or integrity): ").lower()

if choice1 == "hash":
    # Prompt the user to choose between image and audio for hash calculation
    choice2 = input("Choose the type of file for hash calculation (image or audio): ").lower()

    if choice2 == "image":
        # Define the path to your image file for hash calculation
        image_file_path = "test.jpg"

        # Calculate and save hash value for the image file
        image_hash = calculate_and_save_file_hash(image_file_path)
        if image_hash:
            print(f"Image File SHA-256 Hash: {image_hash}")
        else:
            print(f"Image File not found: {image_file_path}")

    elif choice2 == "audio":
        # Define the path to your audio file for hash calculation
        audio_file_path = "test.wav"

        # Calculate and save hash value for the audio file
        audio_hash = calculate_and_save_file_hash(audio_file_path)
        if audio_hash:
            print(f"Audio File SHA-256 Hash: {audio_hash}")
        else:
            print(f"Audio File not found: {audio_file_path}")

    else:
        print("Invalid choice for hash calculation. Please choose either 'image' or 'audio'.")

elif choice1 == "integrity":
    # Prompt the user to choose between image and audio for integrity check
    choice3 = input("Choose the type of file for integrity check (image or audio): ").lower()

    if choice3 == "image":
        # Define the path to your image file for integrity check
        image_file_path = "test.jpg"

        # Analyze image file metadata
        image_metadata = analyze_image_metadata(image_file_path)
        if "Error" in image_metadata:
            print(image_metadata)
        else:
            print("Image File Metadata:")
            for key, value in image_metadata.items():
                print(f"{key}: {value}")

        # Define the path to the text file where hash values are saved
        hash_file_path = "hash_values.txt"

        # Read the previously saved hash value from the text file
        with open(hash_file_path, "r") as hash_file:
            stored_hash = None
            for line in hash_file:
                if image_file_path in line:
                    stored_hash = line.split(": ")[1].strip()
                    break

        # Calculate the current hash value for the image file
        current_hash = calculate_and_save_file_hash(image_file_path)

        if stored_hash:
            print(f"Stored SHA-256 Hash: {stored_hash}")
            print(f"Current SHA-256 Hash: {current_hash}")

            # Compare the current hash with the stored hash
            if current_hash == stored_hash:
                print("Integrity check passed. No changes detected.")
            else:
                print("Alert: File tampered! Changes detected.")

        else:
            print(f"Image File not found in the hash values file: {image_file_path}")

    elif choice3 == "audio":
        # Define the path to your audio file for integrity check
        audio_file_path = "test.wav"

        # Define the path to the text file where hash values are saved
        hash_file_path = "hash_values.txt"

        # Read the previously saved hash value from the text file
        with open(hash_file_path, "r") as hash_file:
            stored_hash = None
            for line in hash_file:
                if audio_file_path in line:
                    stored_hash = line.split(": ")[1].strip()
                    break

        # Calculate the current hash value for the audio file
        current_hash = calculate_and_save_file_hash(audio_file_path)

        if stored_hash:
            print(f"Stored SHA-256 Hash: {stored_hash}")
            print(f"Current SHA-256 Hash: {current_hash}")

            # Compare the current hash with the stored hash
            if current_hash == stored_hash:
                print("Integrity check passed. No changes detected.")
            else:
                print("Alert: File tampered! Changes detected.")

        else:
            print(f"Audio File not found in the hash values file: {audio_file_path}")

    else:
        print("Invalid choice for integrity check. Please choose either 'image' or 'audio'.")

else:
    print("Invalid first choice. Please choose either 'hash' or 'integrity'.")
