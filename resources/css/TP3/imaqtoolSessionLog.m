%Hatem Mnaouer - INDP1A
clc;

%questions 1 et 2
vid = videoinput('winvideo', 1, 'YUY2_320x240');
src = getselectedsource(vid);

vid.FramesPerTrigger = 1;

vid.ReturnedColorspace = 'rgb';

preview(vid);

start(vid);

stoppreview(vid);

Im320rvb = getdata(vid);

vid.ReturnedColorspace = 'grayscale';

preview(vid);

start(vid);

stoppreview(vid);

Im320 = getdata(vid);

% Malheuresemnt, ma webcam ne prend pas en charge le format 160x120 et du
% coup impossible de prendre une photo de ce format avec cette webcam.



% Question 3

vid.ROIPosition = [1 0 319 240];

vid.ROIPosition = [2 0 318 240];

vid.ROIPosition = [3 0 317 240];

vid.ROIPosition = [4 0 316 240];

vid.ROIPosition = [5 0 315 240];

vid.ROIPosition = [6 0 314 240];

vid.ROIPosition = [5 0 315 240];

vid.ROIPosition = [4 0 316 240];

vid.ROIPosition = [3 0 317 240];

vid.ROIPosition = [2 0 318 240];

vid.ROIPosition = [1 0 319 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 240];

vid.ROIPosition = [0 0 320 239];

vid.ROIPosition = [0 0 320 238];

vid.ROIPosition = [0 0 320 237];

vid.ROIPosition = [0 0 320 236];

vid.ROIPosition = [0 0 320 235];

vid.ROIPosition = [0 0 320 234];

vid.ROIPosition = [0 0 320 233];

vid.ROIPosition = [0 0 320 232];

vid.ROIPosition = [0 1 320 232];

vid.ROIPosition = [0 2 320 232];

vid.ROIPosition = [0 3 320 232];

vid.ROIPosition = [0 4 320 232];

vid.ROIPosition = [0 5 320 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [1 5 319 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [2 5 318 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [3 5 317 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [4 5 316 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [2 5 317 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [2 5 316 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [2 5 315 232];

preview(vid);

stoppreview(vid);

vid.ROIPosition = [2 5 314 232];

preview(vid);

start(vid);

stoppreview(vid);

Imcrop = getData(vid)